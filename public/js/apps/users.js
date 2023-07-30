class Users {
    get options() {
      return {
        emptyThumb: Helpers.UrlFix('/img/profile/profile-11.webp'),
      };
    }
  
    constructor(options = {}) {
      this.settings = Object.assign(this.options, options);
  
      this.modal = new bootstrap.Modal(document.getElementById('modal'));
      this.deleteConfirmModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));

      Helpers.FetchJSON(Helpers.UrlFix('/users'), (data) => {
        this.dataRequest = data.map((d) => {
          return d
        });
        this._init();
      });
    }
  
    _init() {
      this.container = document.querySelector('#users .list');
      this.currentItem = null;
      this.listjs = null;
      this.deletingMultiple = false;
      this._addListeners();
      this._initListjs();
      this._initProfileUpload();
      this._initGroupSelect();
    //   this._initCheckAll();
    }
  
    _addListeners() {
      this.container.addEventListener('click', this._onContainerClick.bind(this));
      document.getElementById('newButton') && document.getElementById('newButton').addEventListener('click', this._showAddModal.bind(this));
      document.getElementById('delete') && document.getElementById('delete').addEventListener('click', this._delete.bind(this));
      document.getElementById('add') && document.getElementById('add').addEventListener('click', this._add.bind(this));
      document.getElementById('save') && document.getElementById('save').addEventListener('click', this._save.bind(this));
      document.getElementById('deleteConfirmButton') &&
      document.getElementById('deleteConfirmButton').addEventListener('click', this._deleteConfirm.bind(this));
      document.getElementById('deleteChecked') && document.getElementById('deleteChecked').addEventListener('click', this._deleteChecked.bind(this));
    }
  
    // Select2 plugin initialization in the add/edit modal
    _initGroupSelect() {
      if (jQuery().select2) {
        jQuery('#groupModal').select2({minimumResultsForSearch: Infinity});
      }
    }
  
    // Check all button initialization
    _initCheckAll() {
      new Checkall(document.querySelector('.check-all-container-checkbox-click .btn-custom-control'), {clickSelector: '.form-check'});
    }
  
    // Initializing list.js with the values
    _initListjs() {
      this.listjs = new List(
        document.querySelector('#users'),
        {
          valueNames: ['id', 'name', 'email', 'phone'],
          item: 'itemTemplate',
          page: 8,
          pagination: [
            {
              includeDirectionLinks: true,
              leftDirectionText: '<i class="cs-chevron-left"></i>',
              rightDirectionText: '<i class="cs-chevron-right"></i>',
              liClass: 'page-item',
              aClass: 'page-link shadow',
              innerWindow: 1000, // Hiding ellipsis
            },
          ],
        },
        this.dataRequest,
      );
      this.listjs.sort('id', {order: 'desc'});
      this.listjs.on('updated', function (obj) {});
    }
  
    // List item click event
    _onContainerClick(event) {
      if (!event.target.closest('.view-click')) {
        return;
      }
      event.preventDefault();
      const parent = event.target.closest('.card');
      const id = parent.querySelector('.id').innerHTML;
      this.currentItem = this.listjs.get('id', id)[0];
      this._showDetailModal();
    }
  
    // Empty modal to add new
    _showAddModal(event) {
      this._clearAddEditModal();
      this._enableAdd();
      this.modal.show();
    }
  
    // Shows item on the modal after click
    _showDetailModal() {
      document.getElementById('nameModal').value = this.currentItem.values().name;
      // document.getElementById('positionModal').value = this.currentItem.values().position;
      document.getElementById('emailModal').value = this.currentItem.values().email;
      document.getElementById('phoneModal').value = this.currentItem.values().phone;
      // document.getElementById('groupModal').value = this.currentItem.values().group;
      // document.getElementById('thumbModal').setAttribute('src', this.currentItem.values().thumb);
  
      jQuery('#groupModal').trigger('change');
      this.modal.show();
      this._enableEdit();
    }
  
    // Updating an item
    _save() {
      const id = this.currentItem.values().id;
      const valuesFromModal = this._getCurrentDataFromModal(id);
      this.currentItem.values(valuesFromModal);
      this.modal.hide();
      // Data can be synced here with the backend
    }
  
    // Adding a new item
    _add() {
      const items = this.listjs.items.map((item) => item.values());
      const nextId = Helpers.NextId(items, 'id');
      const newForm = this._getCurrentDataFromModal(nextId);
      this.listjs.add(newForm);
      this.modal.hide();
      // this.listjs.update();
      this.listjs.sort('id', {order: 'desc'});
  
      // Data can be synced here with the backend
    }
  
    // Showing confirmation for deleting an item
    _delete(event) {
      this.deletingMultiple = false;
      document.getElementById('deleteConfirmDetail').innerHTML = this.currentItem.values().name;
      this.deleteConfirmModal.show();
    }
  
    // Showing confirmation for deleting multiple items
    _deleteChecked(event) {
      this.deletingMultiple = true;
      const selectedItems = document.querySelectorAll('.list .card.selected');
      if (selectedItems.length > 0) {
        document.getElementById('deleteConfirmDetail').innerHTML = selectedItems.length + ' item' + (selectedItems.length > 1 ? 's' : '');
        this.deleteConfirmModal.show();
      }
    }
  
    // Deleting an item or multiple based on the deletingMultiple variable
    _deleteConfirm(event) {
      if (this.deletingMultiple) {
        // Deleting multiple items
        const selectedItems = document.querySelectorAll('.list .card.selected');
        selectedItems.forEach((item) => {
          this.listjs.remove('id', item.querySelector('.id').innerHTML);
        });
      } else {
        // Deleting single item
        const id = this.currentItem.values().id;
        this.listjs.remove('id', id);
      }
      this.modal.hide();
      this.deleteConfirmModal.hide();
      const checkAllInput = document.querySelector('.check-all-container-checkbox-click .btn-custom-control input');
      checkAllInput.indeterminate = false;
      checkAllInput.checked = false;
      // Data can be synced here with the backend
    }
  
    // Getting values from the inputs
    _getCurrentDataFromModal(id) {
      return {
        name: document.getElementById('nameModal').value,
       // position: document.getElementById('positionModal').value,
        email: document.getElementById('emailModal').value,
        phone: document.getElementById('phoneModal').value,
        // group: document.getElementById('groupModal').value,
        // thumb: document.getElementById('thumbModal').getAttribute('src'),
        id: id,
      };
    }
  
    // Simple image uplader
    _initProfileUpload() {
      if (typeof SingleImageUpload !== 'undefined') {
        const singleImageUpload = new SingleImageUpload(document.getElementById('imageUpload'), {
          fileSelectCallback: (file) => {
            console.log(file);
            // Upload the file with fetch method
            // let formData = new FormData();
            // formData.append("file", file);
            // formData.append("id", this.currentItemData.id);
            // fetch('/upload/image', { method: "POST", body: formData });
          },
        });
      }
    }
  
    // Clearing values of the modal
    _clearAddEditModal() {
      document.getElementById('nameModal').value = '';
     // document.getElementById('positionModal').value = '';
      document.getElementById('emailModal').value = '';
      document.getElementById('phoneModal').value = '';
      // document.getElementById('groupModal').value = null;
      // document.getElementById('thumbInputModal').value = null;
      // document.getElementById('thumbModal').setAttribute('src', this.settings.emptyThumb);
      // jQuery('#groupModal').trigger('change');
    }
  
    _enableEdit() {
      this._showElement('save');
      this._showElement('delete');
      this._hideElement('add');
    }
  
    _enableAdd() {
      this._hideElement('save');
      this._hideElement('delete');
      this._showElement('add');
    }
  
    _showElement(selector) {
      document.getElementById(selector) && document.getElementById(selector).classList.add('d-inline-block');
      document.getElementById(selector) && document.getElementById(selector).classList.remove('d-none');
    }
  
    _hideElement(selector) {
      document.getElementById(selector) && document.getElementById(selector).classList.remove('d-inline-block');
      document.getElementById(selector) && document.getElementById(selector).classList.add('d-none');
    }
  }
  