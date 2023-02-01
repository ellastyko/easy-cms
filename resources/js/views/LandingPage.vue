<template>
    <section>
        <nav-bar/>
        <section class="flex pt-20">
            <landing-sidebar/>
            <div class="flex-1">
                <div class="w-full p-2">
                    <h1>Articles</h1>
                    <div class="flex justify-between pr-5 align-center">
                        <auto-complete v-model="filters.search"/>
                        <dropdown
                            v-model="filters.sortedBy"
                            optionLabel="name"
                            optionValue="value"
                            :options="options"
                            placeholder="Select a City"
                        />
                    </div>
                </div>
                <div class="flex-1 items-center justify-center p-5">
                    <div
                        class=""
                        v-for="article in articles" :key="article.id"
                    >
                       <Article :data="article"/>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    import NavBar from "../components/NavBar.vue";
    import Article from "../components/Article.vue";
    import LandingSidebar from "../components/LandingSidebar.vue";

    export default {
        name: 'LandingPage',
        components: {Article, NavBar, LandingSidebar },
        mounted() {
            this.getArticles()
        },
        watch: {
            filters: {
                handler() {
                    if (!this.filters.sortedBy) {
                        return;
                    }

                    this.getArticles()
                },
                deep: true
            }
        },
        data() {
            return {
                options: [
                    { name: 'Latest', value: 'desc' },
                    { name: 'Oldest', value: 'asc' }
                ],
                articles: [],
                filters: {
                    search: '',
                    orderBy: 'created_at',
                    sortedBy: 'asc'
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
