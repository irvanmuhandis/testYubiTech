<script setup>
import { ref, watch, onMounted } from 'vue';
import { debounce } from 'lodash';
import { useStore } from 'vuex';


// const { emit } = defineEmits(['send-data']);
var {
    selectedMethod,
    selectedColor,
    colorList,
    isOpenColor,
    subQty,
    styleIndex,
    methodIndex
} = defineProps([
    'selectedMethod',
    'selectedColor',
    'colorList',
    'isOpenColor',
    'subQty',
    'style-index',
    'method-index']);

const selectAllColor = ref(false)
const selectedColorId = ref([]);
const store = useStore();

const toggleColor = (data) => {
    const index = selectedColor.indexOf(data);
    if (index === -1) {
        selectedColor.push(data);
    } else {
        selectedColor.splice(index, 1);
    }
};
const selectedColorAllData = () => {
    if (selectAllColor.value) {
        selectedColor = colorList.map(data => data);

    } else {
        selectedColor = [];
    }
}
const setSelectedColor = (data) => {
    console.log("===set clr===");
    console.log(styleIndex);
    console.log(methodIndex);
    console.log(data);
    store.commit('setSelectedColor', { styleIndex, methodIndex, data });
}
watch(selectedColor, debounce(() =>
    setSelectedColor(selectedColor)
    , 300), { deep: true });

onMounted(() => {
    // assignState();
})
</script>

<template>
    <div v-if="isOpenColor" class="border-top col-md-4 myModal border-end">
        <div class="row p-2">
            <div class="col-md">

                <h1 class="modal-title fs-5">Color Name {{ selectedMethod.name }}</h1>
            </div>
            <div class="col-md-2 float-end">
                <button @click="closeColor" type="button" class="btn-close float-end"></button>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="5%" class="text-center">
                        <input v-model="selectAllColor" @change="selectedColorAllData" class="form-check-input"
                            type="checkbox">
                    </th>
                    <th>Color Name</th>
                    <th>QTY</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in colorList">
                    <td><input :checked="selectedColor.includes(item)" @change="toggleColor(item)"
                            class="form-check-input" type="checkbox">
                    </td>
                    <td>{{ item.name }}</td>
                    <td v-if="selectedColor.includes(item)"><input v-model="item.qty" type="number"></td>
                    <td v-else>Select First</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

import { ref, defineProps, watch } from 'vue';

export default {
    // props: ['subQty'],

    // setup(props) {
    //     // Define subQty as a reactive variable using ref()
    //     const subQtyValue = ref(subQty.value);

    //     const calculate = () => {
    //         selectedColorId.value = selectedColor.map(item => item.id);
    //         console.log(selectedColorId.value);
    //         console.log("calculate...");
    //         var temp = 0;
    //         selectedColor.forEach(element => {
    //             temp += element.qty;
    //         });
    //         subQtyValue.value = temp;
    //         console.log("subqty val :" + subQtyValue.value);
    //         console.log("subqty:" + subQty);
    //     }

    //     watch(
    //         () => selectedColor,
    //         (color) => {
    //             calculate()
    //         },
    //         { deep: true });

    //     return { subQty: subQtyValue, calculate };
    // }
    // ,
    methods: {
        closeColor() {
            this.$emit('close-color', this.isOpenColor);
        }
    }
    // ,
    // setup() {
    //     const { isOpenColor, selectedMethod, colorList } = defineProps(['isOpenColor', 'selectedMethod', 'colorList']);
    //     const { emit } = defineEmits(['close-color']);

    //     const selectAllColor = ref(false);

    //     function toggleColor(data){
    //         const index = selectedMethod.value.selectedColor.indexOf(data);
    //         if (index === -1) {
    //             selectedMethod.value.selectedColor.push(data);
    //         } else {
    //             selectedMethod.value.selectedColor.splice(index, 1);
    //         }
    //     };

    //     const selectedColorAllData = () => {
    //         if (selectAllColor.value) {
    //             selectedMethod.value.selectedColor = colorList.map(data => data);
    //         } else {
    //             selectedMethod.value.selectedColor = [];
    //         }
    //     };

    //     return {
    //         selectAllColor,
    //         toggleColor,
    //         selectedColorAllData
    //     };
    // }
}
</script>
