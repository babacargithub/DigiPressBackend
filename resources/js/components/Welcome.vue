<template>
    <h1>this is a test</h1>
    <input type="file" multiple  @change="pickFiles($event.target.files)" />
</template>
<script>
export default {
    setup: () => ({
        title: 'How To Install Vue 3 in Laravel 8 From Scratch'
    }),
    methods: {
        pickFiles(files) {
            console.log(files)
        }
    },
    mounted() {
        window.axios.get('/api/parutions')
    }
}
</script>
