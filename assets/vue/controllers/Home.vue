<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>PHP HUB</h1>
                <p>All you need about dev, {{ name }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    name: String,
    services: Array
});
console.log(name)

</script>