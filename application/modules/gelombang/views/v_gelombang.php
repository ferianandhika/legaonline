<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap-toggle.min.css">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Data Gelombang Pendaftaran</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Data master</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Gelombang Pendaftaran</li>
    </ol>
    <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i class="fa fa-angle-down"></i><input type="hidden" name="datestart" /><input type="hidden" name="endstart" />
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="portlet box">
                <div class="portlet-header">
                    <div class="caption text-primary">Data Gelombang Pendaftaran</div>
                    <a href="#" style="float: right;" data-target="#modal-add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add</a>
                </div>
                <div class="portlet-body">
                    <div class="row justyfy-content-center">
                        <input type="hidden" class="csrfname_token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="col-lg-12 col">
                            <div class="table-responsive">
                                <table id="table-group" class="table table-hover table-striped table-bordered table-advanced">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>status</th>
                                            <th>Date Created</th>
                                            <th>Update Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php if (is_array($gelombang) || is_object($gelombang)) : ?>
                                            <?php foreach ($gelombang as $data) : ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $data->nama_gel ?></td>
                                                    <td><span class="badge <?php echo $data->status ? "badge-success" : "badge-primary" ?>"><?php echo $data->status ? "Active" : "Tidak Active" ?></span></td>
                                                    <td><?php echo $data->date_created ?></td>
                                                    <td><?php echo $data->update_created ?></td>
                                                    <td>
                                                        <a href="javascript:void(0)" id="hapus-gelombang" data-id="<?php echo encripts($data->id) ?>" class="btn btn-primary btn_hapus_gelombang"><i class="fa fa-trash-o"></i></a>
                                                        <a href="javascript:void(0)" data-target="#modal-edit" data-toggle="modal" data-id="<?php echo encripts($data->id) ?>" data-name="<?php echo $data->nama_gel ?>" id="btn_edit_gelombang" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                        <?php $cheked = ($data->status == 1) ? "checked" : "" ?>
                                                        <input style="margin-right: 30px;" type="checkbox" <?php echo $cheked ?> data-toggle="toggle" name="status" data-id="<?php echo encripts($data->id) ?>" class="toggle_status">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-header-primary-label" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Edit Data Gelombang Pendaftaran</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('gelombang/update', ['class' => "form-body form-horizontal"]); ?>
                <input type="hidden" id="id_input" name="id_input">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10 controls mb-5">
                        <input type="text" name="name_gel" id="name" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                <button type="submit" class="btn btn-primary">Edit changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-header-primary-label" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Tambah Data Gelombang Pendaftaran</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('gelombang/create', ['class' => "form-body form-horizontal"]); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10 controls mb-5">
                        <input type="text" name="name" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10 controls mb-5">
                        <select name="status" id="status" class="form-control">
                            <option value="">-- Pilih Satus --</option>
                            <option value="1">Active</option>
                            <option value="0">Non Active</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/admin/js/bootstrap-toggle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data-master').addClass('active');
        $('#gelombang').addClass('active');
        $('#table-group').DataTable();

        $('.toggle_status').change(function() {
            let status = $(this).prop('checked');
            let id_gelombang = $(this).attr('data-id');
            if (status) {
                document.location.href = '<?php echo base_url('gelombang/active/') ?>' + id_gelombang;
            } else {
                document.location.href = '<?php echo base_url('gelombang/non_active/') ?>' + id_gelombang;
            }
        });

        $('#modal-edit').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget);
            var modal = $(this);
            modal.find('#id_input').attr("value", div.data('id'));
            modal.find('#name').attr('value', div.data('name'));
        });
        $('.btn_hapus_gelombang').click(function() {
            let id_gelombang = $(this).attr('data-id');
            let csrfName = $('.csrfname_token').attr('name');
            let csrfHash = $('.csrfname_token').val();
            let dataJson = {
                [csrfName]: csrfHash,
                id_gelombang: id_gelombang
            };
            Swal.fire({
                title: 'Apakah yakin?',
                text: "untuk Hapus data gelombang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'iya, saya yakin!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "<?php echo base_url('gelombang/delete') ?>",
                        data: dataJson,
                        success: function(respon) {
                            console.log(respon);
                            $('.csrfname_token').val(respon.token);
                            if (respon.status == true) {
                                Swal.fire(
                                    'Active!',
                                    respon.messege,
                                    'success'
                                );
                                document.location.reload();
                            } else {
                                Swal.fire(
                                    'Active!',
                                    respon.messege,
                                    'success'
                                );
                                document.location.reload();
                            }
                        },
                        error: function(e) {
                            console.log(e.responseText);
                            Swal.fire(
                                'Active',
                                "Server errors",
                                'errors'
                            );
                        }
                    });
                }
            });
        });
    });
</script>