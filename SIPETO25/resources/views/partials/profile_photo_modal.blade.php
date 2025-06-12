<div class="modal fade" id="editPhotoModal" tabindex="-1" role="dialog" aria-labelledby="editPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #29335C;">
                <h5 class="modal-title" id="editPhotoModalLabel">Ganti Foto Profil</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="uploadPhotoForm" action="{{ route('profile.update-photo') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo" class="font-weight-bold" style="color: #29335C;">Pilih Foto Baru</label>
                                <div class="custom-file">
                                    <input type="file" name="photo" id="photo" class="custom-file-input" required accept="image/*">
                                    <label class="custom-file-label" for="photo">Pilih file...</label>
                                </div>
                                <small class="form-text text-muted">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</small>
                            </div>
                            
                            <div class="current-photo mt-4">
                                <h6 class="font-weight-bold" style="color: #29335C;">Foto Saat Ini:</h6>
                                <img src="{{ Auth::user()->photo_path ? asset(Auth::user()->photo_path) : asset('adminlte/dist/img/avatar2.png') }}" 
                                     alt="Current Photo" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="image-preview-container">
                                <h6 class="font-weight-bold" style="color: #29335C;">Pratinjau Foto Baru:</h6>
                                <div class="preview-wrapper border rounded p-2 text-center">
                                    <img id="imagePreview" src="#" alt="Preview" class="img-fluid" style="max-height: 250px; display: none;">
                                    <div id="noPreview" class="text-muted py-5">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <p>Belum ada gambar dipilih</p>
                                    </div>
                                </div>
                                
                                <div class="preview-meta mt-2">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Ukuran:</span>
                                        <span id="fileSize">-</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Dimensi:</span>
                                        <span id="fileDimensions">-</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Tipe:</span>
                                        <span id="fileType">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Batal
                    </button>
                    <button type="submit" class="btn text-white" id="submitBtn" style="background-color: #29335C;">
                        <i class="fas fa-save mr-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.preview-wrapper {
    min-height: 250px;
    background-color: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
}
.custom-file-label::after {
    content: "Telusuri";
    background-color: #e9ecef;
    color: #29335C;
    border-left: 1px solid #ced4da;
}
.btn-outline-secondary {
    border-color: #29335C;
    color: #29335C;
}
.btn-outline-secondary:hover {
    background-color: #29335C;
    color: white;
}
</style>

<script>
$(document).ready(function() {
    // Initialize file input
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // Image preview functionality
    $('#photo').change(function() {
        const file = this.files[0];
        const preview = $('#imagePreview');
        const noPreview = $('#noPreview');
        
        if (file) {
            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Format file tidak didukung. Harap pilih file gambar (JPEG, PNG, JPG, GIF)');
                $(this).val('');
                return;
            }
            
            // Validate file size (2MB max)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 2MB');
                $(this).val('');
                return;
            }
            
            // Display file info
            $('#fileSize').text((file.size / 1024).toFixed(2) + ' KB');
            $('#fileType').text(file.type.split('/')[1].toUpperCase());
            
            // Create preview
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.attr('src', e.target.result);
                
                // Get image dimensions
                const img = new Image();
                img.onload = function() {
                    $('#fileDimensions').text(this.width + ' × ' + this.height + ' px');
                };
                img.src = e.target.result;
                
                preview.show();
                noPreview.hide();
            };
            
            reader.readAsDataURL(file);
        } else {
            preview.hide();
            noPreview.show();
            $('.custom-file-label').removeClass("selected").html('Pilih file...');
            $('#fileSize, #fileType, #fileDimensions').text('-');
        }
    });

    // Form submission
    $('#uploadPhotoForm').submit(function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = $('#submitBtn');
        const originalBtnText = submitBtn.html();
        
        // Show loading state
        submitBtn.prop('disabled', true).html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Mengunggah...
        `);
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#editPhotoModal').modal('hide');
                    
                    // Show success message
                    alert('Foto profil berhasil diperbarui!');
                    
                    // Update profile photo
                    const newPhotoUrl = response.photo_url + '?' + new Date().getTime();
                    $('.profile-photo').attr('src', newPhotoUrl);
                    $('.current-photo img').attr('src', newPhotoUrl);
                    
                    // Reset form
                    $('#uploadPhotoForm')[0].reset();
                    $('#imagePreview').hide();
                    $('#noPreview').show();
                    $('.custom-file-label').removeClass("selected").html('Pilih file...');
                    $('#fileSize, #fileType, #fileDimensions').text('-');
                }
            },
            error: function(xhr) {
                let errorMsg = 'Terjadi kesalahan saat mengunggah foto';
                
                if (xhr.status === 422) {
                    errorMsg = xhr.responseJSON.message || 'Validasi gagal';
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                
                alert(errorMsg);
            },
            complete: function() {
                submitBtn.prop('disabled', false).html(originalBtnText);
            }
        });
    });
    
    // Reset form when modal is closed
    $('#editPhotoModal').on('hidden.bs.modal', function () {
        $('#uploadPhotoForm')[0].reset();
        $('#imagePreview').hide();
        $('#noPreview').show();
        $('.custom-file-label').removeClass("selected").html('Pilih file...');
        $('#fileSize, #fileType, #fileDimensions').text('-');
    });
});
</script>