<template>
    <div>
        <h1 class="mb-1 font-bold text-3xl flex gap-1 items-baseline font-mono">{{ data.title }}
            <span class="text-sm text-purple-700">{{ data.author?.name }}</span>
        </h1>
        <div class="grid max-w-3xl gap-2 py-10 px-8 sm:grid-cols-2 bg-white rounded-md border-t-4 border-purple-400">
            <p class="text-gray-700 text-base">{{ data.content }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Article",
    props: {
        data: {
            type: Array,
            default: []
        }
    }
}
</script>
