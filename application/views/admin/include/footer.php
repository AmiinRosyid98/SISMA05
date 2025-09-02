</div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
      <div class="footer-wrapper container-fluid">
        <div class="row">
          <div class="col-sm-6 my-1">
            <p class="m-0">
              Berry &#9829; crafted by Team
              <a href="https://themeforest.net/user/codedthemes" target="_blank">CodedThemes</a>
            </p>
          </div>
          <div class="col-sm-6 ms-auto my-1">
            <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
              <li class="list-inline-item"><a href="../index.html">Home</a></li>
              <li class="list-inline-item"><a href="https://codedthemes.gitbook.io/berry-bootstrap/" target="_blank">Documentation</a></li>
              <li class="list-inline-item"><a href="https://codedthemes.support-hub.io/" target="_blank">Support</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
 <!-- Required Js -->
<script src="<?= base_url() ?>assets/js/plugins/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/icon/custom-font.js"></script>
<script src="<?= base_url() ?>assets/js/script.js"></script>
<script src="<?= base_url() ?>assets/js/theme.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/feather.min.js"></script>

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
       // lokasi lembaga 

       var map = L.map('mapLokasiLembaga').setView([-2.5489, 118.0149], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Add custom marker
        const customIcon = L.divIcon({
            html: '<div style="background-color: #7367f0; width: 32px; height: 32px; border-radius: 50%; border: 3px solid #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;"><i class="ti ti-map-pin" style="color: white; font-size: 14px;"></i></div>',
            className: 'custom-marker',
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });
        
        

        <?php 

            $query = $this->db->select('users.nama, lembaga.*')
            ->from('lembaga')
            ->join('users', 'lembaga.user_id = users.id', 'left')
            ->where('lembaga.status_pengajuan', 'aktif')
            ->where('lembaga.deleted_at', null)
            ->order_by('lembaga.created_at', 'DESC')->get();
            $lembaga_query = $query->result();
            foreach ($lembaga_query as $row) {
            
            ?>
                L.marker([<?php echo $row->latitude; ?>, <?php echo $row->longitude; ?>], {
                    draggable: true,
                    icon: customIcon
                }).addTo(map).bindPopup(`
                    <div style="min-width: 200px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                        <div>
                            <img src="<?= base_url() ?>uploads/lembaga/logo/<?= $row->logo_lembaga ?>" alt="Logo" style="width: 50px; height: 50px; border-radius: 10px; object-fit: cover;">
                        </div>
                        <div>
                            <h6 class="mb-1">
                                <a href="<?= base_url() ?>dashboard/detail_lembaga/<?= $row->id ?>" target="_blank"><?= addslashes($row->nama_lembaga) ?></a>
                            </h6>
                            <p class="mb-1 small text-muted">
                                <i class="ti ti-map-pin me-1"></i>
                                <?= addslashes($row->alamat) ?>
                            </p>
                        </div>
                        </div>
                    </div>`);
            <?php 
                
            }

        ?>


       
       
       
    });
</script>


   
<script>
  layout_change('light');
</script>
   
<script>
  font_change('Roboto');
</script>
 
<script>
  change_box_container('false');
</script>
 
<script>
  layout_caption_change('true');
</script>
   
<script>
  layout_rtl_change('false');
</script>
 
<script>
  preset_change('preset-1');
</script>



    <!-- [Page Specific JS] start -->
    <!-- Apex Chart -->
    <script src="<?= base_url() ?>assets/js/plugins/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/dashboard-default.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $('.btn-delete-data').click(function() {
            var id = $(this).data('id');
            var table = $(this).attr('table');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url() ?>dashboard/deletedata',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: id, table: table},
                        success: function(response) {
                            if(response.status == 'success') {
                                toastr.success(response.message);
                                location.reload();
                            } else {
                                toastr.error(response.message);
                            }
                        }
                    });
                }
            });
        });

        $('.btn-simpan-user').click(function() {
            var id = $('#id').val();
            var nama = $('#nama').val();
            var email = $('#email').val();
            var wa = $('#wa').val();
            var kota = $('#kota').val();
            var nama_lembaga = $('#nama_lembaga').val();
            var status = $('#status').val();

            $.ajax({
                url: '<?= base_url() ?>dashboard/doedituser',
                type: 'POST',
                dataType: 'json',
                data: {id: id, nama: nama, email: email, wa: wa, kota: kota, nama_lembaga: nama_lembaga, status: status},
                success: function(response) {
                    if(response.status == 'success') {
                        toastr.success(response.message);
                        location.href = '<?= base_url() ?>dashboard/listuser';
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });
    $(document).ready(function() {
        <?php if(isset($pilihpembayaran)) { ?>
        <?php if($pilihpembayaran == "sudah") { ?>
             $.ajax({
                url: '<?= base_url("dashboard/get_instruksi_ajax") ?>',
                type: 'POST',
                data: { reference: "<?= $detailmethod->reference ?>" },
                dataType: 'json',
                success: function(res) {
                    if (res.success) {
                        let html = '';
                        const data = res.data;

                        if (data.instructions && data.instructions.length > 0) {
                            data.instructions.forEach(function(instruksi, index) {
                                html+=`
                                    <div class="accordion-item">
                                      <input type="checkbox" id="acc${index}" />
                                      <label for="acc${index}" style="margin-bottom:0px">
                                        <span>${instruksi.title}</span>
                                        <i class="fas fa-chevron-right icon"></i>
                                      </label>
                                      <div class="accordion-content">
                                        <ol>`;
                                instruksi.steps.forEach(function(step) {
                                    html += '<li>' + step + '</li>';
                                });
                                html+=`
                                        </ol>
                                      </div>
                                    </div>
                                `
                            });
                        } else {
                            html += '<p style="padding:15px; margin:0px; text-align:center;"><i>Instruksi belum tersedia.</i></p>';
                        }

                        $('.accordion').html(html);
                    } else {
                        $('.accordion').html('<p style="color:red;">Gagal mengambil instruksi.</p>');
                    }
                },
                error: function(xhr) {
                    $('.accordion').html('<p style="color:red;">Terjadi kesalahan saat mengambil data.</p>');
                }
            })

        <?php } ?>
        <?php } ?>
      $('#datatable').DataTable({
          responsive: true,
          autoWidth: false,
          dom: 
              '<"d-flex justify-content-between align-items-center flex-wrap"lf>' + 
              'tr' + 
              '<"d-flex justify-content-between justify-content-md-between justify-content-center flex-wrap mt-2"ip>',
          language: {
              url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json'
          },
          columnDefs: [
              {
                  targets: -1,   // kolom ke-7 (aksi)
                  orderable: false,
                  searchable: false
              }
          ]
      });

      // Initialize tooltips
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl);
      });

    });

    <?php 
      if($this->session->flashdata('success')){
        echo 'toastr.success("' . $this->session->flashdata('success') . '");';
      }
    ?>

    
</script>
<script>
    // Initialize map

    <?php if ($this->uri->segment(2) == 'detail_lembaga' || ($this->uri->segment(2) == '' && $this->uri->segment(1) == 'dashboard')): ?>
      <?php else: ?>
    let map, marker;
    
    let zoomLevel = 13;
    
    // Initialize map with default location
    // initMap(defaultLat, defaultLng);
    

    
      <?php if(isset($lembaga) && $lembaga->latitude && $lembaga->longitude): ?>
        const defaultLat = parseFloat('<?= $lembaga->latitude ?? -6.3015 ?>');
        const defaultLng = parseFloat('<?= $lembaga->longitude ?? 106.8119 ?>');
        initMap(defaultLat, defaultLng);
      <?php else: ?>
      let defaultLat = -6.3015; // Default latitude (Jakarta)
      let defaultLng = 106.8119; // Default longitude (Jakarta)
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
              function(position) {
                  const lat = position.coords.latitude;
                  const lng = position.coords.longitude;
                  initMap(lat, lng);
              },
              function(error) {
                  console.error("Error getting location: ", error);
                  alert("Tidak dapat mendapatkan lokasi Anda. Pastikan izin lokasi diaktifkan.");
              },
              { enableHighAccuracy: true }
          );
      } else {
          // alert("Browser Anda tidak mendukung geolokasi.");
          initMap(defaultLat, defaultLng);
      }
    <?php endif; ?>
   
    
    // Get current location button click handler
    $('#getLocationBtn').click(function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    updateMap(lat, lng);
                    updateMarkerPosition(lat, lng);
                    updateCoordinates(lat, lng);
                },
                function(error) {
                    console.error("Error getting location: ", error);
                    alert("Tidak dapat mendapatkan lokasi Anda. Pastikan izin lokasi diaktifkan.");
                },
                { enableHighAccuracy: true }
            );
        } else {
            alert("Browser Anda tidak mendukung geolokasi.");
        }
    });
    
    // Initialize map function
    
    function initMap(lat, lng) {
        // Initialize map
        map = L.map('map').setView([lat, lng], zoomLevel);
        
        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19,
            detectRetina: true
        }).addTo(map);
        
        // Add custom marker
        const customIcon = L.divIcon({
            html: '<div style="background-color: #7367f0; width: 32px; height: 32px; border-radius: 50%; border: 3px solid #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;"><i class="ti ti-map-pin" style="color: white; font-size: 14px;"></i></div>',
            className: 'custom-marker',
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });
        
        // Add marker
        marker = L.marker([lat, lng], {
            draggable: true,
            icon: customIcon
        }).addTo(map);
        
        // Update coordinates when marker is dragged
        marker.on('dragend', function(e) {
            const position = marker.getLatLng();
            updateCoordinates(position.lat, position.lng);
        });
        
        // Update coordinates when map is clicked
        map.on('click', function(e) {
            updateMarkerPosition(e.latlng.lat, e.latlng.lng);
            updateCoordinates(e.latlng.lat, e.latlng.lng);
        });
        
        // Update coordinates in form
        updateCoordinates(lat, lng);
    }
    
    // Update marker position
    function updateMarkerPosition(lat, lng) {
        marker.setLatLng([lat, lng]);
        map.setView([lat, lng], zoomLevel);
    }
    
    // Update map view
    function updateMap(lat, lng) {
        map.setView([lat, lng], zoomLevel);
    }
    
    // Update coordinate inputs
    function updateCoordinates(lat, lng) {
        $('#latitude').val(lat.toFixed(6));
        $('#longitude').val(lng.toFixed(6));
    }
    <?php endif; ?>
    // Preview image
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $('#logo').change(function () {
        previewImage(this);
    });
    <?php if ($this->uri->segment(2) == 'detail_lembaga' || ($this->uri->segment(2) == '' && $this->uri->segment(1) == 'dashboard')): ?>
    <?php else: ?>
    <?php if (isset($lembaga) && $lembaga->latitude && $lembaga->longitude): ?>
    document.addEventListener('DOMContentLoaded', function() {
      
        const latitude = <?= $lembaga->latitude ?>;
        const longitude = <?= $lembaga->longitude ?>;

        // cek kalau container ada
        const container = document.getElementById("propertyMap");
        
        // console.log("propertyMap:", document.getElementById("propertyMap"));
        if (!container) return;
        
        const map = L.map('propertyMap', {
            center: [latitude, longitude],
            zoom: 16,
            zoomControl: false,
            scrollWheelZoom: false,
            dragging: !L.Browser.mobile
        });

        // kontrol zoom
        L.control.zoom({ position: 'topright' }).addTo(map);

        // tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19,
            detectRetina: true
        }).addTo(map);

        // custom marker
        const customIcon = L.divIcon({
            html: '<div style="background-color: #7367f0; width: 32px; height: 32px; border-radius: 50%; border: 3px solid #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;"><i class="ti ti-home" style="color: white; font-size: 14px;"></i></div>',
            className: 'custom-marker',
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        const marker = L.marker([latitude, longitude], {
            icon: customIcon,
            title: '<?= addslashes($lembaga->nama_lembaga) ?>'
        }).addTo(map);

        marker.bindPopup(`
            <div style="min-width: 200px;">
                <h6 class="mb-1"><?= addslashes($lembaga->nama_lembaga) ?></h6>
                <p class="mb-1 small text-muted">
                    <i class="ti ti-map-pin me-1"></i>
                    <?= addslashes($lembaga->alamat) ?>
                </p>
            </div>
        `).openPopup();
    });

    <?php endif; ?>
    <?php endif; ?>

$('#status_pengajuan').change(function() {
    // alert("tes")
    if ($(this).val() == 'rejected') {
        $('#alasan_ditolak').show();
    } else {
        $('#alasan_ditolak').hide();
    }
});
<?php if($this->uri->segment(2) == 'form_lembaga' || $this->uri->segment(2) == 'edit_lembaga'): ?>
$('#jumlah_siswa').on('input', function() {
    const jumlahSiswa = parseInt($(this).val()) || 0;
    let periode = $('#periode').val();
    if (periode == '') {
        periode = 1;
    }
    console.log(jumlahSiswa);
    const tagihan = jumlahSiswa * parseInt('<?= $setting->biaya_langganan ?>') * periode;
    $('#tagihan').text(tagihan.toLocaleString('id-ID'));
});

$('#periode').on('change', function() {
    const jumlahSiswa = parseInt($('#jumlah_siswa').val()) || 0;
    let periode = $(this).val();
    if (periode == '') {
        periode = 1;
    }
    console.log(jumlahSiswa);
    const tagihan = jumlahSiswa * parseInt('<?= $setting->biaya_langganan ?>') * periode;
    $('#tagihan').text(tagihan.toLocaleString('id-ID'));
    $('#periode_tagihan').text(periode <= 1 ?  "" : periode);

});
<?php endif; ?>

function formatNumberManually(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

$('.method-item').on('click', function () {


    const method = $(this).data('method');
    let jumlah_tarif = $("#jumlah_tarif").val()
    let total = jumlah_tarif
    $('.method-item').removeClass('active')
    $(this).addClass('active')

    $.ajax({
        url: '<?= base_url('dashboard/fee_calculator') ?>',
        method: 'POST',
        dataType:'json',
        data:{
            method:method,
            total:total,
        },
        success: function (res) {
            if(res.status == "success"){
                $('#datamethod').val(method)
                $('.biayaadmin').show()
                $('.jumlahadmin').html(res.biayaadmin_format)
                total = parseInt(jumlah_tarif) + parseInt(res.biayaadmin)
                $('.total_amount').html(formatNumberManually(total))


            } else {
                toastr.error('Metode Pembayaran Tidak Tersedia');

            }
        }
    })

    return false


});

$('.btn-confirm').on('click', function(){
    const method = $('#datamethod').val();
    
    let jumlah_tarif = $('#jumlah_tarif').val();
    let invoice_id = $('#invoice_id').val();

    $('#response').html('⏳ Membuat transaksi...');
    // asdasd asd

    $.ajax({
        url: '<?= base_url('dashboard/create_tripay') ?>',
        method: 'POST',
        dataType:'json',
        data: { 
            method: method ,
            invoice_id: invoice_id,
            jumlah_tarif: jumlah_tarif,

        },
        success: function (res) {
        // alert(res.success)
        if (res.success) {
            $('#virtualAccountNumber').html(res.data.pay_code)
            
            $('.aftersubmit').show()
            $('.hiddenaftersubmit').hide()

            if(res.data.payment_method == "BRIVA"){
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/BRIVA.png")
            $('.for-va').show()
            $('.for-qris').hide()
            $('.for-ovo').hide()
            $('.for-retail').hide()

            } else if (res.data.payment_method == "BCAVA"){
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/BCAVA.png")
            $('.for-va').show()
            $('.for-qris').hide()
            $('.for-ovo').hide()
            $('.for-retail').hide()



            } else if (res.data.payment_method == "MANDIRIVA"){
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/MANDIRIVA.png")
            $('.for-va').show()
            $('.for-qris').hide()
            $('.for-ovo').hide()
            $('.for-retail').hide()



            } else if (res.data.payment_method == "BNIVA"){
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/BNIVA.png")
            $('.for-va').show()
            $('.for-qris').hide()
            $('.for-ovo').hide()
            $('.for-retail').hide()



            }
            else if (res.data.payment_method == "QRIS"){
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/QRIS.png")
            $('.qrcode').attr("src", res.data.qr_url)
            $('.for-va').hide()
            $('.for-qris').show()
            $('.for-ovo').hide()
            $('.for-retail').hide()


            }
            else if (res.data.payment_method == "OVO"){
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/OVO.png")
            // $('.qrcode').attr("src", res.data.qr_url)
            $('.for-va').hide()
            $('.for-qris').hide()
            $('.for-ovo').show()
            $('.for-retail').hide()

            $('.btn-ewallet').removeClass('btn-shopeepay')
            $('.btn-ewallet').removeClass('btn-dana')
            $('.btn-ewallet').addClass('btn-ovo')
            $('.link-ewallet').attr("href", res.data.checkout_url)
            $('.method-retail').html(res.data.payment_method )

            }
            else if (res.data.payment_method == "DANA"){
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/DANA.png")
            // $('.qrcode').attr("src", res.data.qr_url)
            $('.for-va').hide()
            $('.for-qris').hide()
            $('.for-ovo').show()
            $('.for-retail').hide()

            $('.btn-ewallet').removeClass('btn-ovo')
            $('.btn-ewallet').removeClass('btn-shopeepay')
            $('.btn-ewallet').addClass('btn-dana')
            $('.link-ewallet').attr("href", res.data.checkout_url)
            $('.method-retail').html(res.data.payment_method )




            }
            else if (res.data.payment_method == "SHOPEEPAY"){
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/shopeepay.png")
            // $('.qrcode').attr("src", res.data.qr_url)
            $('.for-va').hide()
            $('.for-qris').hide()
            $('.for-ovo').show()
            $('.for-retail').hide()

            $('.btn-ewallet').removeClass('btn-ovo')
            $('.btn-ewallet').addClass('btn-shopeepay')
            $('.btn-ewallet').removeClass('btn-dana')
            $('.link-ewallet').attr("href", res.data.checkout_url)
            $('.method-retail').html(res.data.payment_method )




            }
            else if (res.data.payment_method == "ALFAMART" || res.data.payment_method == "ALFAMIDI" || res.data.payment_method == "INDOMARET"){
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/"+res.data.payment_method.toLowerCase() +".png")
            // $('.qrcode').attr("src", res.data.qr_url)
            $('.for-va').hide()
            $('.for-qris').hide()
            $('.for-ovo').hide()
            $('.for-retail').show()
            $('.btn-ewallet').removeClass('btn-ovo')
            $('.btn-ewallet').addClass('btn-dana')
            $('.link-ewallet').attr("href", res.data.checkout_url)
            $('.method-retail').html(kapitalDepan(res.data.payment_method) )
            

            $('.virtual-account-number').html(res.data.pay_code)

            }
            else  {

            let str = res.data.payment_method;
            let hasil = str.slice(0, -2); 
            $('.bank-logo').attr("src", "<?= base_url() ?>uploads/payment/logo/"+str+".png")
            $('.for-va').show()
            $('.for-qris').hide()
            $('.for-ovo').hide()
            $('.for-retail').hide()



            }
            $('.label-va').html(res.data.payment_name)
            $('.invc').show()
            $('.invoicenya').html(res.data.merchant_ref)
            $('.deadline-time').html(res.data.expired_time_db)
            $('.payment-deadline-box').show()
            $('.reference').val(res.data.reference)
            let html =``;
            const data = res.data;
            if (data.instructions && data.instructions.length > 0) {
                data.instructions.forEach(function(instruksi, index) {
                    html+=`
                        <div class="accordion-item">
                            <input type="checkbox" id="acc${index}" />
                            <label for="acc${index}" style="margin-bottom:0px">
                            <span>${instruksi.title}</span>
                            <i class="fas fa-chevron-right icon"></i>
                            </label>
                            <div class="accordion-content">
                            <ol>`;
                    instruksi.steps.forEach(function(step) {
                        html += '<li>' + step + '</li>';
                    });
                    html+=`
                            </ol>
                            </div>
                        </div>
                    `
                });
            } else {
                html += '<p style="padding:15px; margin:0px; text-align:center;"><i>Instruksi belum tersedia.</i></p>';
            }

            $('.accordion').html(html);

            $('.btn-sudahbayar').click(function(){
                $.ajax({
                    url: '<?= base_url('dashboard/cekpembayaran') ?>',
                    type: 'post',
                    dataType:'json',
                    data: {
                        ID: res.data.reference,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            location.reload();
                        }

                        if (data.status == "tidak") {
                            Swal.fire({
                                title: 'Mohon maaf pembayaran anda belum dilakukan',
                                text: '',
                                type: 'warning',
                                showConfirmButton: false,
                                showCancelButton: true,
                                cancelButtonColor: '#3085d6',
                                cancelButtonText: 'Oke'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }
                    }
                });
            });

            setInterval(function() {

                $.ajax({
                    url: '<?= base_url('dashboard/cekpembayaran') ?>',
                    type: 'post',
                    dataType:'json',
                    data: {
                        ID: res.data.reference,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            location.reload();
                        }
                    }
                });
            }, 1000 * 10);

        } else {
            // $('#response').html(`<div class="alert alert-danger">❌ Gagal: ${res.message}</div>`);   
            toastr.error("Gagal: " + res.message);
        }
        },
        error: function () {
            toastr.error('Terjadi kesalahan AJAX.');
        }
    });
})

function copyVirtualAccount() {
    const vaNumberElement = document.getElementById('virtualAccountNumber');
    const vaNumber = vaNumberElement.textContent;
    const copyButton = document.querySelector('.copy-button');
    const copyButtonText = document.getElementById('copyButtonText');

    // Fallback for older browsers
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(vaNumber)
            .then(() => {
                copyButtonText.textContent = 'Disalin!';
                copyButton.classList.add('copied');
                setTimeout(() => {
                    copyButtonText.textContent = 'Salin Nomor VA';
                    copyButton.classList.remove('copied');
                }, 2000); // Reset text after 2 seconds
            })
            .catch(err => {
                console.error('Gagal menyalin:', err);
                alert('Gagal menyalin nomor VA. Silakan salin secara manual: ' + vaNumber);
            });
    } else {
        // Deprecated method for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = vaNumber;
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
            document.execCommand('copy');
            copyButtonText.textContent = 'Disalin!';
            copyButton.classList.add('copied');
            setTimeout(() => {
                copyButtonText.textContent = 'Salin Nomor VA';
                copyButton.classList.remove('copied');
            }, 2000);
        } catch (err) {
            console.error('Gagal menyalin (fallback):', err);
            alert('Gagal menyalin nomor VA. Silakan salin secara manual: ' + vaNumber);
        }
        document.body.removeChild(textArea);
    }
}

<?php if(isset($pilihpembayaran) && $pilihpembayaran == "sudah") { ?>
            $('.btn-sudahbayar').click(function(){
                $.ajax({
                    url: '<?= base_url('dashboard/cekpembayaran') ?>',
                    type: 'post',
                    dataType:'json',
                    data: {
                        ID: '<?= $detailmethod->reference ?>',
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            location.reload();
                        }

                        if (data.status == "tidak") {
                            Swal.fire({
                                title: 'Mohon maaf pembayaran anda belum dilakukan',
                                text: '',
                                type: 'warning',
                                showConfirmButton: false,
                                showCancelButton: true,
                                cancelButtonColor: '#3085d6',
                                cancelButtonText: 'Oke'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }
                    }
                });
            });
            <?php if ($detailmethod->status != "PAID" ){ ?>
            setInterval(function() {

                $.ajax({
                    url: '<?= base_url('dashboard/cekpembayaran') ?>',
                    type: 'post',
                    dataType:'json',
                    data: {
                        ID: '<?= $detailmethod->reference ?>',
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            location.reload();
                        }
                    }
                });
            }, 1000 * 10);
            <?php } ?>
            <?php } ?>



</script>
    <!-- [Page Specific JS] end -->
  </body>
  <!-- [Body] end -->
</html>
