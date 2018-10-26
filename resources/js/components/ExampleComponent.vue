<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">brucelli</div>

                    <div class="card-body">
                        I'm an test.
                    </div>
                    <div>
                        <el-radio class="radio" v-model="radio" label="1">备选项</el-radio>
                        <el-radio class="radio" v-model="radio" label="2">备选项</el-radio>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                radio: '1'
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
