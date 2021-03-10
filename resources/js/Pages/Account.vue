<template>
<div class="container my-5 px-5 pt-5 pb-1 z-depth-1">


  <section class="text-center">
    

    <h2 class="font-weight-bold mb-5">Mon Compte</h2>


    <div class="row mb-5">

      <div class="col-12">

        <ul class="nav md-pills nav-justified pills-rounded mb-4 mt-2">
          <li class="nav-item">
            <a class="nav-link mt-2 btn btn-primary" data-toggle="tab" href="#panel100" role="tab">Mes Informations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mt-2 btn btn-primary" data-toggle="tab" href="#panel101" role="tab">Mes commentaires</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mt-2 btn btn-primary" data-toggle="tab" href="#panel102" role="tab">Supprimer mon compte</a>
          </li>
        </ul>

        <div class="tab-content">

          <div class="tab-pane fade in show active" id="panel100" role="tabpanel">

            <div class="view rounded z-depth-1-half mx-4">
              <img src="https://mdbootstrap.com/img/Photos/Others/Intros/intro3.jpg" alt="Display of a full page intro page with call to action buttons"
                class="img-fluid">
            </div>

          </div>

          <div class="tab-pane fade" id="panel101" role="tabpanel">

            <div class="view rounded z-depth-1-half mx-4">
              <img src="https://mdbootstrap.com/img/Photos/Others/Intros/intro1a.jpg" alt="Display of a full page intro page with call to action buttons"
                class="img-fluid">
            </div>

          </div>

          <div class="tab-pane fade" id="panel102" role="tabpanel">

            <div class="view rounded z-depth-1-half mx-4">
              <img src="https://mdbootstrap.com/img/Photos/Others/Intros/intro4a.jpg" alt="Display of a full page intro page with call to action buttons"
                class="img-fluid">
            </div>

          </div>

  
        </div>
      </div>

    </div>
  </section>
</div>
</template>


<script>
export default {
  props: ['user'],
   
}
</script>
