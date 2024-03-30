<script setup>
import { ref, watch, onMounted } from 'vue';
import { debounce } from 'lodash';
import { useStore } from 'vuex';

var {
    selectedMethodItem,
    isOpenColor,
    subQty,
    styleIndex,
    methodIndex,
    selectedMethod
} = defineProps([
    'selectedMethodItem',
    'isOpenColor',
    'subQty',
    'style-index',
    'method-index',
    'selected-method']);

const selectAllColor = ref(false);
const selectedColor = ref([]);
const store = useStore();
const colorList = ref([]);

const fetchColor = () => {
    axios.get('/api/name')
        .then(response => {
            const apiData = response.data;
            colorList.value = apiData;
        })
        .catch(error => {
            console.log("===error===");
            console.log(error);
        });
}
const toggleColor = (data) => {
    const index = selectedColor.value.indexOf(data);
    if (index === -1) {
        selectedColor.value.push(data);
    } else {
        selectedColor.value.splice(index, 1);
    }
};
const selectedColorAllData = () => {
    if (selectAllColor.value) {
        selectedColor.value = colorList.map(data => data);
    } else {
        selectedColor.value = [];
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
    setSelectedColor(selectedColor.value)
    , 300), { deep: true });
onMounted(() => {
    fetchColor();
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
                <tr v-for="(item) in colorList" :key="item.id">
                    <td><input :checked="selectedColor.includes(item)" @change="toggleColor(item)"
                            class="form-check-input" type="checkbox">
                    </td>
                    <td>{{ item.name }}</td>
                    <td v-if="selectedColor.includes(item)">
                        <input v-model="item.qty" type="number">
                    </td>
                    <td v-else>Select First</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

import { ref, defineProps, watch } from 'vue';

export default {
    methods: {
        closeColor() {
            this.$emit('close-color', this.isOpenColor);
        }
    }
}
</script>
