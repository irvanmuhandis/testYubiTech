<script setup>
import FormSale from '../components/FormSale.vue';
import TableSale from '../components/TableSale.vue';
import { mapGetters, useStore } from 'vuex';
import { ref } from 'vue';
const store = useStore();
const styles = ref();
const forms = ref();
const isSuccess = ref(null);

const postBtn = () => {
    styles.value = store.getters.getStyle;
    forms.value = store.getters.getForm;
    console.log(styles.value);

    var datas = {
        form: forms.value,
        style: styles.value
    }

    axios.post('/api/store', datas)
        .then((response) => {
            console.log(response.data);
            isSuccess.value = true;
        })
        .catch((error) => {
            console.log(error);
            isSuccess.value = false;
        })
}

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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <RouterLink to="/sale">Sale</RouterLink>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <FormSale />
        <div class="d-inline
        ">
            <div class="ms-3 float-end">
                <button class="btn btn-outline-dark" @click="postBtn()">SAVE</button>
            </div>
            <div v-if="isSuccess==true" class="card bg-success">
               <div class="text-light m-2">
                Berhasil Menambahkan Data
               </div>
            </div>
            <div v-if="isSuccess==false" class="card bg-danger">
              <div class="text-light m-2">
                Gagal Menambahkan Data
              </div>

            </div>
        </div>

    </div>
</template>
