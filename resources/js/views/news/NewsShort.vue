<template>
    
     <div class="newsshort">
        <div class="newsshort-phrase-date">
            <div class="newsshort-phrase">
                {{ newsItem.phrase }}
            </div>
            <div class="newsshort-date">
                {{ newsItem.date_published }}
            </div>
        </div>
        <div class="newsshort-title">
            <router-link :to="{name: 'NewsAbout', params: {id: newsItem.id}}">
                {{ newsItem.title }}
            </router-link>
        </div>
        <div class="newsshort-summary">
            {{ newsItem.summary }}
        </div>
    </div>
     
</template>

<script>
import NewsAbout from './NewsAbout.vue';

export default {
    props: ['newsItem'], 
    components: {NewsAbout}
  }


</script>

<style>

.newsshort {
    width: 100%;
    display: flex;
    margin-bottom: 2rem;
    flex-direction: column;
}

.newsshort-title {
    margin-bottom: 0.5rem; 
}

.newsshort-title a {
    color: #000;
    font-size: 1.5rem;
    font-family: var(--news-title-font);
    cursor: pointer;
    font-weight: 400;
}
.newsshort-phrase-date {
    display: flex;
    justify-content: space-between;
    
}
.newsshort-phrase-date>div {
    color: var(--component-accent-color2);
    font-size: 0.8125rem;
    font-weight: 300;
}

.newsshort-title a:hover {
    color: none;
}

.newsshort-phrase {
    text-transform: uppercase;
    
}

.newsshort-summary {
    display: block;
    font-size: 0.9375rem;
}

@media only screen and (min-width: 1024px) {

.newsshort-title a:hover {
    color: var(--component-accent-color1);
}
}

</style>