<template>

    <div id="downloadPop" class="download-image-pop" @click.prevent="downloadItem(url, label)">
        <h4>Скачать</h4>
    </div>
</template>

<script>
import Axios from 'axios'

export default {
    props: ['url', 'label'],

    methods: {
        downloadItem(url, label) {
            Axios.get(url, { responseType: 'blob' })
                .then(response => {
                const blob = new Blob([response.data]);
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = label;
                link.click();
                URL.revokeObjectURL(link.href);
            }).catch(console.error);
        }
    }
}

</script>

<style>

@media only screen and (max-width: 768px) {
    .download-image-pop {
    background-color: #FFF;
    }
}

@media only screen and (min-width: 1024px) {
    .download-image-pop {
    background-color: #D5D5D5;
    }
}

.download-image-pop {
    border: 1px solid #D5D5D5;
    display: inline;
    cursor: pointer;
    padding: 0.25rem 1rem;
    border-radius: 0.25rem;
    transition: none;
}

.download-image-pop:hover {
    background-color: #FFF;
    border: 1px solid #FFF;
}

.download-image-pop:active {
    background-color: var(--component-accent-color2);
}

.download-image-pop h4 {
    color: #454545;
    font-size: 1rem;
    text-align: center;
}

</style>