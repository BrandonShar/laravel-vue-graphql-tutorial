<template functional>
    <button>
        <h3>{{ props.name }}</h3>
        <p class="price-label">Price: ${{ props.price }}</p>
        <p>You save: ${{ props.savings }}</p>
    </button>
</template>

<style scoped>
    button {
        width: 110%;
        background-color: #b3c5e1;
        color: white;
        border: none;
        line-height: 14px;
        padding-top: 20px; 
        margin-top: 6px;
        cursor: pointer;
    }

    h3 {
        line-height: 24px;
        font-weight: bold;
        height: 60px;
    }

    .price-label {
        margin-bottom: 3px;
        margin-top: 20px;
        font-size: 1.1em;
        font-weight: bold;
    }
</style>
