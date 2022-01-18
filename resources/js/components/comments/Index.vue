<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <ul class=" navbar-nav">
                <li class="nav-item">
                    <router-link exact active-class="active" :to="{name: 'Table'}" class="nav-link">List</router-link>
                </li>
                <li class="nav-item">
                    <router-link exact active-class="active" :to="{name: 'Form'}" class="nav-link">Form</router-link>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <router-view></router-view>
            <!-- <data-table/> -->
        </div>
    </div>
</template>

<script>
import DataTable from './DataTable'
    export default {
        components:{
            DataTable
        }
    }
</script>

<style scoped>
    /* .router-link-exact-active{
        font-weight: bold;
    } */
</style>
