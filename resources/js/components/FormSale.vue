<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import TableSale from './TableSale.vue';
import { useStore } from 'vuex';
import { debounce } from 'lodash';

const store = useStore();
const isOpenStyle = ref(false);
const switchStyle = () => {
    isOpenStyle.value = !isOpenStyle.value;
}
const closeStyle = () => {
    isOpenStyle.value = false;
}
const styleList = ref([]);
const fetchStyle = () => {
    axios.get('/api/style')
        .then(response => {
            const apiData = response.data;
            styleList.value = apiData;
        })
        .catch(error => {
            console.log("===error===");
            console.log(error);
        });
}
const selectAll = ref(false)
const selectedStyle = ref([])
const toggleSelection = (data) => {
    const index = selectedStyle.value.indexOf(data);
    if (index === -1) {
        selectedStyle.value.push(data);
    } else {
        selectedStyle.value.splice(index, 1);
        if (selectAll.value) {
            selectAll.value = false;
        }
    }
};
const selectedAllData = () => {
    if (selectAll.value) {
        selectedStyle.value = styleList.value.map(data => data);
        setStyle(selectedStyle.value);
    } else {
        selectedStyle.value = [];
    }
}

const setStyle = (data) => {
    store.commit('setStyle', { data });
}
watch(selectedStyle.value, debounce(() =>
    setStyle(selectedStyle.value)
    , 300), { deep: true });

onMounted(() => {
    fetchStyle();
})
</script>
<template>
    <div class="card mb-4">
        <div class="row rounded">
            <div v-if="isOpenStyle" class="border-top col-md-2 pe-0 myModal border-end">
                <div class="row p-2 ">
                    <div class="col-md">
                        <h1 class="modal-title fs-5">Style</h1>
                    </div>
                    <div class="col-md-2 float-end">
                        <button @click="closeStyle" type="button" class="btn-close float-end"></button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" width="5%" class="text-center">
                                <input @change="selectedAllData" v-model="selectAll" class="form-check-input"
                                    type="checkbox">
                            </th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in styleList" :key="item.id">
                            <td>
                                <input :checked="selectedStyle.includes(item)" @change="toggleSelection(item)"
                                    class="form-check-input" type="checkbox">
                            </td>
                            <td>{{ item.style_name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md m-3">
                <h1 class="display-4 fst-italic">Sales Order Information</h1>
                <div class="form-group">
                    <label class="form-label">SO Number</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                    </div>
                    <label class="form-label">Nama Customer</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                    </div>
                    <label class="form-label">Tanggal Pemesanan</label>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div @click="switchStyle" class="btn btn-primary btn">{{ isOpenStyle ? "CLOSE STYLE" : "ADD STYLE" }}
                </div>
            </div>
        </div>
    </div>
    <TableSale :key="item.id" v-for="(item, index) in selectedStyle" :styleSales="item" :styleIndex="index" />
</template>
