@if($command=='layout')
    <div id='{{$componentID}}' class='border-box'>
        <div class="kt-portlet ">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon-notes"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        [name]
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                [content]
            </div>
        </div>


        <div class='action pull-right'>
            <a href='javascript:void(0)' data-componentid='{{$componentID}}' data-name='Panel Area' class='btn-edit-component'><i class='fa fa-pencil'></i></a>
            &nbsp;
            <a href='javascript:void(0)' data-componentid='{{$componentID}}' class='btn-delete-component'><i class='fa fa-trash'></i></a>
        </div>
    </div>
@elseif($command=='configuration')
    <form method='post'>
        <input type='hidden' name='_token' value='{{csrf_token()}}'/>
        <input type='hidden' name='componentid' value='{{$componentID}}'/>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" required name='config[name]' type='text' value='{{@$config->name}}'/>
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea name='config[content]' required rows="10" class='form-control'>{{@$config->content}}</textarea>
        </div>

    </form>
@elseif($command=='showFunction')
    <?php
    echo $value;
    ?>
@endif	