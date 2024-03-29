{!! Form::open([
    'url' => '/companies',
    'class' => 'form',
    'novalidate' => 'novalidate',
    'files' => 'true'
]) !!}
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-6">
            <label>Company Legal Name</label>
            <input type="text" class="form-control" name="company" placeholder="Company Legal Name">
        </div>
        <div class="col-md-6">
            <label>Company DBA</label>
            <input type="text" class="form-control" name="dba" placeholder="Company DBA">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Company Website</label>
            <input type="text" class="form-control" name="website" placeholder="Company Website">
        </div>
        <div class="col-md-6">
            <label>Custom URL <span class="mini-text">Click for instructions</span></label>
            <input type="text" class="form-control" name="custom_url" placeholder="Custom URL">
        </div>
    </div>
    <div class="row" style="margin:20px 0;">
        <div class="col-md-6 col-md-offset-3">
            <label>Company Logo (.png of 340px X 115px)</label>
            <input type="file" class="form-control" name="file">
        </div>
        <div class="col-md-3" style="margin-top:32px;">
            <input type="submit" class="btn btn-uam">
        </div>
    </div>
{!! Form::close() !!}
<br><br>
