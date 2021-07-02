<div class="row mt-4 d-flex justify-content-center">

  <div class="col-10">

    @if (Request::is('*/create'))
    <h6 class="text-center my-2"><strong>Untuk Group ID, isi inisial group saja. Contoh GTI, LO, PTN, etc.</strong></h6>
    @endif

    <!-- Group ID -->
    @if (Request::is('*/create'))
    <x-form-input title="Group ID Save *" ipname="input_id" value="{{old('input_id')}}" placeholder="contoh ID Group : GTI, LO, PTN" maxlength="3" opsi="required" />
    @endif

    <!-- Department -->
    @if (Request::is('*/create'))
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Department *</span>
      </div>
      <select class="form-control form-control-sm" id="dept_id" name="dept_id">
        @foreach ($departments as $dept_id => $dept_name)
        <option value="{{$dept_id}}">
          {{$dept_id}} - {{$dept_name}}
        </option>
        @endforeach
      </select>
    </div>
    @endif

    <!-- Group ID Save -->
    @if (Request::is('*/create'))
    <x-form-input title="Group ID Save *" ipname="access_group" value="{{old('access_group')}}" maxlength="5" opsi="readonly required" />
    @endif

    <!-- Group Description -->
    @if (Request::is('*/edit'))
    <x-form-input title="Group Description *" ipname="access_name" placeholder="contoh nama group : GTI ADMIN, LO TEKNISI" value="{{$user_group->access_name}}" maxlength="15" opsi="required" />
    @else
    <x-form-input title="Group Description *" ipname="access_name" placeholder="contoh nama group : GTI ADMIN, LO TEKNISI" value="{{old('access_name')}}" maxlength="15" opsi="required" />
    @endif

  </div>

  @if (Request::is('*edit*'))
  @if ($updated_by != '')
  <footer class="blockquote-footer text-right">
    <small class="text-muted">
      terakhir diedit: <cite title="Source Title">
        {{ Carbon\Carbon::parse($user_group->updated_at)->format('d M Y H:i:s') }}
        oleh
        {{$updated_by}}
      </cite>
    </small>
  </footer>
  @endif
  @endif

</div>

<script>
  $(document).ready(function() {
    $('#input_id, #access_name').on('input', function(evt) {
      $(this).val(function(_, val) {
        return val.toUpperCase();
      });
      $('#access_group').val($('#input_id').val()+$('#dept_id').val())
    });

    $('#dept_id').on('change', function(){
      $('#access_group').val($('#input_id').val()+$('#dept_id').val())
    });
  });
</script>