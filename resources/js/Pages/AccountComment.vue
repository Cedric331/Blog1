<template>
<div class="container z-depth-1 my-5 py-5 px-4 px-lg-0">

  <section>
    
    <h3 class="font-weight-bold text-center dark-grey-text pb-2">Historique de vos commentaires</h3>
    <hr class="w-header my-4">
    
    <div v-if="comments.length>0" class="row">
      <div class="col-lg-8 mx-auto">
        <ol class="timeline">

          <li v-for="comment in comments" :key="comment.id" class="timeline-element">
             <a :href="'/articles/'+comment.article.slug">
               <h5 class="font-weight-bold dark-grey-text mb-3">{{comment.article.title}}</h5>
             </a>
            <p class="grey-text font-small"><time>{{comment.created_at}}</time></p>
            <p class="text-muted">{{comment.commentaire}}</p>
          </li>

        </ol>
      </div>
    </div>

    <div v-else>
       <h4>Aucun commentaire</h4>
    </div>
    
  </section>
  <!-- Section -->
  
</div>
</template>

<script>
export default {
  props: ['comments'],
   
}
</script>

    <style>
      .timeline {
        position: relative;
        list-style: none;
        padding: 1rem 0;
        margin: 0;
      }

      .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 2px;
        margin-left: -1px;
        background-color: #50a1ff;
      }

      .timeline-element {
        position: relative;
        width: 50%;
        padding: 1rem 0;
        padding-right: 2.5rem;
        text-align: right;
      }

      .timeline-element::before {
        content: '';
        position: absolute;
        right: -8px;
        top: 1.35rem;
        display: inline-block;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 2px solid #50a1ff;
        background-color: #fff;
      }

      .timeline-element:nth-child(even)::before {
        right: auto;
        left: -8px;
      }

      .timeline-element:nth-child(even) {
        margin-left: 50%;
        padding-left: 2.5rem;
        padding-right: 0;
        text-align: left;
      }

      @media (max-width: 767.98px) {
        .timeline::before {
          left: 8px;
        }
      }

      @media (max-width: 767.98px) {
        .timeline-element {
          width: 100%;
          text-align: left;
          padding-left: 2.5rem;
          padding-right: 0;
        }
      }

      @media (max-width: 767.98px) {
        .timeline-element::before {
          top: 1.25rem;
          left: 1px;
        }
      }

      @media (max-width: 767.98px) {
        .timeline-element:nth-child(even) {
          margin-left: 0rem;
        }
      }

      @media (max-width: 767.98px) {
        .timeline-element {
          width: 100%;
          text-align: left;
          padding-left: 2.5rem;
          padding-right: 0;
        }
      }

      @media (max-width: 767.98px) {
        .timeline-element:nth-child(even)::before {
          left: 1px;
        }
      }

      @media (max-width: 767.98px) {
        .timeline-element::before {
          top: 1.25rem;
        }
      }
    </style>
