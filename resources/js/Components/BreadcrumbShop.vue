<template>
    <div aria-label="Breadcrumb" class="mx-12 my-2 shadow py-2 pl-4 flex gap-2 items-center">
        <Link :href="route('welcome')">
        <HomeIcon class="w-4 text-rose-500 hover:text-rose-900" />
        </Link>
        <ChevronRightIcon class="w-4 text-rose-500" />
        <Link :href="route('shop.index')" class="text-rose-500 hover:text-rose-900">Catálogo</Link>
        <ChevronRightIcon class="w-4 text-rose-500" />
        <div>
            <slot name="breadcrumb"></slot>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { ChevronRightIcon, HomeIcon } from '@heroicons/vue/outline'

export default {
    components: {
        Link,
        ChevronRightIcon,
        HomeIcon,
    }
    
}
</script>

<style>
</style>