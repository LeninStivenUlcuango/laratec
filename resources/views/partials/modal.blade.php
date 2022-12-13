<div class="modal fade" data-bs-backdrop="static" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
      </div>
      <div class="modal-body">
        Estas seguro de eliminar este registro
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" :disabled="showSpinner">No</button>
        <button type="button" class="btn btn-primary" @click="deleteIt" :disabled="showSpinner">
          <div v-if="showSpinner" class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
          Si, estoy seguro
        </button>
      </div>
    </div>
  </div>
</div>