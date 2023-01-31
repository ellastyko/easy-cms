<template>
    <div>
        Landing
    </div>
</template>

<script>

    export default {
        name: 'LandingPage',
        components: { },
        mounted() {
            this.getArticles()
        },
        computed: {

        },
        data() {
            return {
                articles: [],
                filters: {
                    search: '',
                    orderBy: 'created_at',
                    sortBy: 'desc'
                },
            }
        },
        methods: {
            async getArticles () {
                const response = await axios.get('/api/articles', { params: this.filters })
                this.articles = response.data.articles
            }
        }
    }
</script>


<style scoped lang="scss">

</style>
