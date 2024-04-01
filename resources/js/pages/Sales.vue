<script setup>
import { ref, onMounted, watch, computed } from 'vue';

const sales = ref([]);
const fetchMethod = () => {
    axios.get('/api/sales')
        .then(response => {
            const apiData = response.data;
            sales.value = apiData;
        })
        .catch(error => {
            console.log(error);
        });
}

onMounted(() => {
    fetchMethod();
})
</script>
<template>
    <div class="content p-5">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Test Software Engineer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">
                                <RouterLink to="/">Home</RouterLink>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Sale
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="card p-3">
            <h1 class="display-4 fst-italic">Sales List</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" width="5%">
                            NO
                        </th>
                        <th>Sales Order Number</th>
                        <th>Customer</th>
                        <th>Tanggal</th>
                        <th>Total Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in sales" :key="item.id">
                        <td>{{ index+1 }} </td>
                        <td>{{ item.sonummber }}</td>
                        <td>{{ item.customer }}</td>
                        <td>{{ item.date }}</td>
                        <td>{{ item.sale_style_sum_qty }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
