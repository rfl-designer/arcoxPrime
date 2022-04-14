<template>
    <app-layout-customer :title="`Catálogo: ${categoryName}`" :categories="categories">
        <h2 class="text-base text-white font-medium py-2 text-center w-full bg-emerald-900">
            Cart</h2>
        <breadcrumb-shop>
            <template #breadcrumb>
                <div>
                    <span class="text-rose-900">Cart</span>
                </div>
            </template>
        </breadcrumb-shop>
        <ul>
            <li v-for="item in cart" :key="item.id">{{ item.product_title }}</li>
        </ul>
    </app-layout-customer>
</template>

<script>
import AppLayoutCustomer from '@/Layouts/AppLayoutCustomer.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { ChevronRightIcon, HomeIcon } from '@heroicons/vue/outline'
import BreadcrumbShop from '@/Components/BreadcrumbShop.vue'

export default {
    components: {
        AppLayoutCustomer,
        Link,
        Head,
        ChevronRightIcon,
        HomeIcon,
        BreadcrumbShop,
    },
    props: ['products', 'categories', 'categoryName', 'cart', 'user'],
    setup() {
    const form = useForm({
      quantity: 1,
    })

    return {
      form,
    }
  },

}
</script>

