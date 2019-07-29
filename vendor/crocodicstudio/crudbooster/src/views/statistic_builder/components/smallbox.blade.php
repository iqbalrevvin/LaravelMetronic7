@if($command=='layout')
    <div id='{{$componentID}}' class='border-box'>
        <div class="kt-portlet">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-xl">
                    <div class="col-md-12 ">
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        [name]
                                    </h4>
                                </div>
                                <span class="kt-widget24__stats kt-font-brand">
                                    [sql]
                                </span>
                            </div>
                            <div class="kt-widget24__action">
                                <span class="kt-widget24__change">
                                    <a href="[link]">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='action pull-right'>
            <a href='javascript:void(0)' data-componentid='{{$componentID}}' data-name='Small Box' class='btn-edit-component'><i class='fa fa-pencil'></i></a>
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
            <label>Icon By Ionicons</label>
            <input class="form-control" required name='config[icon]' type='text' value='{{@$config->icon}}'/>
            E.g : ion-bag . You can find more icon, checkout at <a target='_blank' href='http://ionicons.com/'>ionicons.com</a>
        </div>

        <div class="form-group">
            <label>Color</label>
            <select class='form-control' required name='config[color]'>
                <option {{(@$config->color == 'bg-green')?"selected":""}} value='bg-green'>Green</option>
                <option {{(@$config->color == 'bg-red')?"selected":""}} value='bg-red'>Red</option>
                <option {{(@$config->color == 'bg-aqua')?"selected":""}} value='bg-aqua'>Aqua</option>
                <option {{(@$config->color == 'bg-yellow')?"selected":""}} value='bg-yellow'>Yellow</option>
            </select>
        </div>

        <div class="form-group">
            <label>Link</label>
            <input class="form-control" required name='config[link]' type='text' value='{{@$config->link}}'/>
        </div>

        <div class="form-group">
            <label>Count (SQL QUERY)</label>
            <textarea name='config[sql]' rows="5" class='form-control'>{{@$config->sql}}</textarea>
            <div class="help-block">Make sure the sql query are correct unless the widget will be broken. Mak sure give the alias name each column. You may use
                alias [SESSION_NAME] to get the session
            </div>
        </div>

    </form>
@elseif($command=='showFunction')
    <?php
    if ($key == 'sql') {
        try {
            $sessions = Session::all();
            foreach ($sessions as $key => $val) {
                $value = str_replace("[".$key."]", $val, $value);
            }
            echo reset(DB::select(DB::raw($value))[0]);
        } catch (\Exception $e) {
            echo 'ERROR';
        }
    } else {
        echo $value;
    }

    ?>
@endif	