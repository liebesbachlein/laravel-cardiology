<template  >
    <div v-if="id1 != null && id2 != null">
        <ImageView :url="url" :id1="id1" :id2="id2" :limit="limit" :label="data[id1][0] + '-' + id2 + '.jpg'"
                            @closeImageView="closeImageView"
                            @leftIndex="leftIndex"
                            @rightIndex="rightIndex"
                            />
    </div>
    
    <div class="gallery">
        <div class="subpage-title">
            Галерея
        </div>

        <div v-for="(output, ID1) in outputs" class="box-box" :key="ID1">
            <div class="red-line-gallery" v-if="ID1 != 0"></div>
            <div class="gallery-header">{{ output.name }}</div>
            <div class="gallery-box">
                <div v-for="(URL, ID2) in output.data" class="gallery-flexbox-item" :key="ID2">
                    <div class="gallery-aspect-box">
                        <div class="gallery-strechy-box">
                            <div :style="{backgroundImage: URL}" @click="showImageView(ID1, ID2, URL)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
        


</template>

<script>
import ImageView from './ImageView.vue'

export default {
    components: {ImageView},
    data: function() {
        return {
            data: [
            ['event6', 30, "Конференция «Академия Кардио-Терапевта: Региональный Тур» в г. Караганда (24 — 25 апреля 2024)"],
            ['event5', 68, "Конференция «Академия Кардио-Терапевта: Региональный Тур» в г. Усть-Каменогорск (14 — 15 марта 2024)"],
            ['event4', 41, "VI Республиканская научно-практическая конференция «Секреты женского сердца – 2024» в г. Алматы (29 февраля 2024)"],
            ['event3', 32, "Конференция «Академия Кардио-Терапевта: Региональный Тур» в г. Шымкент (8 — 9 февраля 2024)"],
            ['event2', 15, "Республиканская конференция по антиагрегантной и антикоагулянтной терапии с международным участием (28 ноября 2019 года)"], 
            ['event1', 11, "Секреты женского сердца — 2020. Здоровье, стиль и долголетие женщины"], 

                ],

        outputs: [], 
        showParatemers: [],
        id1: null,
        id2: null,
        url: null
        }
    },
    computed: {
        limit: function() {
            if (this.id1 != null) {
                return this.outputs[this.id1].data.length
            } else {
                return ''
            }
        }
    },
    mounted() {
        for (let i = 0; i < this.data.length; i++) {
            let arr = []
            let arrShow = []
            for (let j = 1; j <= this.data[i][1]; j++ ) {
                arr.push('url(\"/gallery/' + this.data[i][0] + '/' + String(j) + '.jpg\")')
                arrShow.push(1)
            }
            this.outputs.push({"data": arr, "name": this.data[i][2]})
            this.showParatemers.push(arrShow)
        }

        document.addEventListener('keydown', (event) => {
            if(this.id1 != null && this.id2 != null && this.url != null) {
        if (event.key === 'ArrowLeft') {
            this.leftIndex()
        } else if (event.key === 'ArrowRight') {
            this.rightIndex()
        } else if (event.key === 'Escape') {
            this.closeImageView()
        }
    }
    })


    document.addEventListener('touchstart', handleTouchStart, false);        
document.addEventListener('touchmove', handleTouchMove, false);

let xDown = null;                                                        
let yDown = null;

function getTouches(evt) {
  return evt.touches ||             // browser API
         evt.originalEvent.touches; // jQuery
}                                                     
                                                                         
function handleTouchStart(evt) {
    const firstTouch = getTouches(evt)[0];                                      
    xDown = firstTouch.clientX;                                      
    yDown = firstTouch.clientY;                                      
};                                                
                                                                         
function handleTouchMove(evt) {
    if ( ! xDown || ! yDown ) {
        return;
    }

    var xUp = evt.touches[0].clientX;                                    
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;
                                                                         
    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {
        if ( xDiff > 0 ) {
            this.rightIndex()
        } else {
            this.leftIndex()
        }                       
    } else {
        if ( yDiff > 0 ) {
            this.closeImageView()
        } else { 
            /* up swipe */
        }                                                                 
    }
    /* reset values */
    xDown = null;
    yDown = null;                                             
};
    }, 
    methods: {
        showImageView(id1, id2, url) {
            this.id1 = id1
            this.id2 = id2
            this.url = url
        }, 
        closeImageView() {
            this.id1 = null
            this.id2 = null
            this.url = null
        }, 
        leftIndex() {
            if(this.id2 == 0) {
                this.id2 = this.showParatemers[this.id1].length - 1   
            } else {
                this.id2 = this.id2 - 1
            }
            this.url = this.outputs[this.id1].data[this.id2]
        }, 
        rightIndex() {
            if(this.id2 == this.showParatemers[this.id1].length - 1) {
                this.id2 = 0
            } else {
                this.id2 = this.id2 + 1
            }
            this.url = this.outputs[this.id1].data[this.id2]
        },
    }
}

</script>

<style>

.gallery-header {
    padding: 2rem 0.5rem 1rem 0.5rem;
    color: var(--component-accent-color2);
    font-weight: 400;
    font-size: 1.5rem;
    font-family: var(--news-title-font);
}


.gallery .box-box {
    position: relative;
    margin-bottom: 2rem;
}


.gallery-box {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    row-gap: 0;
}

.gallery-flexbox-item {
    width: 50%;
}

.gallery-aspect-box {
    width: 100%;
    padding-top: 75%;
    position: relative;
}

.gallery-strechy-box {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    padding: 0.25rem;
}

.gallery-strechy-box>div {
    width: 100%;
    height: 100%;
    background-size: cover;
    cursor: pointer;
    background-position: center;
}


.red-line-gallery {
    display: block;
    width: 33%;
    border-top: 1px solid var(--component-accent-color1);
    margin: 0 auto;
}


@media only screen and (max-width: 1023px) and (min-width: 769px) {


.gallery-flexbox-item {
    width: 33.3%;
}


.gallery-strechy-box {
    padding: 0.3275rem;
}


}

@media only screen and (min-width: 1024px) {


.gallery-flexbox-item {
    width: 33.3%;
}


.gallery-strechy-box {
    padding: 0.5rem;
}
}
</style>