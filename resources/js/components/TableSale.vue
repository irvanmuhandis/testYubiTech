<script setup>
import { ref, onMounted, watch, computed } from 'vue';
import { debounce } from 'lodash';
import ColorName from './ColorName.vue';
import { useStore } from 'vuex';

var { styleSales, styleIndex } = defineProps(['styleSales', 'styleIndex']);


const store = useStore();
const isOpenMethod = ref(false);
const switchMethod = () => {
    isOpenMethod.value = !isOpenMethod.value;
}

const closeMethod = () => {
    isOpenMethod.value = false;
}
const methodList = ref([]);
const fetchMethod = () => {
    axios.get('/api/method')
        .then(response => {
            const apiData = response.data;
            methodList.value = apiData;
            // Process the API data and update the Vue component's data properties
        })
        .catch(error => {
            // Handle any errors that occurred during the API request
        });
}

const colorList = ref([]);
const fetchColor = () => {
    axios.get('/api/name')
        .then(response => {
            const apiData = response.data;
            apiData.forEach(element => {
                element['qty'] = 0;
            });
            colorList.value = apiData;

            // Process the API data and update the Vue component's data properties
        })
        .catch(error => {
            // Handle any errors that occurred during the API request
        });
}


const selectAllMethod = ref(false)
const selectedMethods = ref([])
const toggleMethod = (data) => {
    const index = selectedMethods.value.indexOf(data);
    if (index === -1) {
        selectedMethods.value.push(data);
    } else {
        selectedMethods.value.splice(index, 1);
        if (selectAllMethod.value) {
            selectAllMethod.value = false;
        }
    }
    console.log('====index=======arr=====data================');
    console.log(index);
    console.log(selectedMethods.value);
    console.log(data);
    console.log('====================================');
};
const selectedMethodsAllData = () => {
    if (selectAllMethod.value) {
        selectedMethods.value = methodList.value.map(item => item);
    } else {
        selectedMethods.value = [];
    }
    console.log(selectedMethods.value);
    // setSelectedMethods(selectedMethods.value);
}


const switchColor = (item) => {
    item.isOpenColor = !item.isOpenColor;
    selectedMethods.value.forEach(method => {
        if (method !== item) {
            method.isOpenColor = false;
        }
    });
}
const closeColor = (item) => {
    item.isOpenColor = false;
}


const setSelectedMethods = (data) => {
    console.log("===set mthd===");
    console.log(styleIndex);
    console.log(data);
    store.commit('setSelectedMethod', { styleIndex, data });
}
watch(selectedMethods.value, debounce(() =>
    setSelectedMethods(selectedMethods.value)
    , 300), { deep: true });

onMounted(() => {
    fetchMethod();
    fetchColor();
})
</script>
<template>
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div v-if="isOpenMethod" class="border-top col-md-2 myModal border-end">
            <div class="row p-2">
                <div class="col-md">
                    <h1 class="modal-title fs-5">Method Name</h1>
                </div>
                <div class="col-md-2 float-end">
                    <button @click="closeMethod" type="button" class="btn-close float-end"></button>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">
                            <input @change="selectedMethodsAllData" v-model="selectAllMethod" class="form-check-input"
                                type="checkbox">
                        </th>
                        <th>Method Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in methodList">
                        <td><input @change="toggleMethod(item)" :checked="selectedMethods.includes(item)"
                                class="form-check-input" type="checkbox">
                        </td>
                        <td>{{ item.name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <ColorName v-for="(item, index) in selectedMethods" :isOpenColor="item.isOpenColor"
            @close-color="closeColor(item)" :colorList="colorList" :style-index="styleIndex" :method-index="index"
            :selectedMethod="item" :selectedColor="item.selectedColor" :subQty="item.subQty" />

        <div class="border-top col-md p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-dark">Style {{ styleSales.style_name }}</strong>
            <div class="mb-1 text-muted">QTY : {{ styleSales.total }}</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Method Name</th>
                        <th>Color Name</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item, index in selectedMethods">
                        <th>{{ index + 1 }}</th>
                        <td>{{ item.name }}</td>
                        <td><button @click="switchColor(item)" class="btn btn-outline-dark">+{{
            item.selectedColor.length }}
                                Selected</button></td>
                        <td>{{ item.subQty }}</td>
                    </tr>
                </tbody>
            </table>
            <button @click="switchMethod" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                {{ !isOpenMethod ? "ADD METHOD" : "CLOSE METHOD" }}
            </button>
        </div>
    </div>
</template>
