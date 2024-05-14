<?php
class Helper
{
    public static function cmsButton($name, $id, $link, $icon, $type = 'new')
    {
        $xhtml = '<li class="button" id="' . $id . '">';
        if ($type == 'new') {
            $xhtml .= '<a href="' . $link . '"><span class="' . $icon . '"></span>' . $name . '</a>';
        } else if ($type == 'submit') {
            $xhtml .= '<a href="#" onclick="javascript:submitForm(\'' . $link . '\')"><span class="' . $icon . '"></span>' . $name . '</a>';
        }

        $xhtml .= '</li>';
        return $xhtml;
    }

    public static function cmsStatus($statusValue, $link, $id)
    {
        $strStatus = ($statusValue == 0) ? 'unpublish' : 'publish';
        $xhtml      = '<a class="jgrid" id="status-' . $id . '" href="javascript:changeStatus(\'' . $link . '\')"><span class="state ' . $strStatus . '"></span></a>';
        return $xhtml;
    }

    public static function cmsGroupACP($groupACPValue, $link, $id)
    {
        $strGroupACP = ($groupACPValue == 0) ? 'unpublish' : 'publish';
        $xhtml      = '<a class="jgrid" id="group-acp-' . $id . '" href="javascript:changeGroupACP(\'' . $link . '\')"><span class="state ' . $strGroupACP . '"></span></a>';
        return $xhtml;
    }


    public static function cmsLinkSort($name, $column, $columnPost, $orderPost)
    {
        //public\template\admin\main\images\admin\sort_asc.png
        $img = '';
        $order = ($orderPost == 'desc') ? 'asc' : 'desc';
        if ($column == $columnPost) {
            $img = '<img src="' . TEMPLATE_URL . 'admin/main/images/admin/sort_' . $orderPost . '.png" alt="">';
        }
        $xhtml = '<a href="#" onclick="javascript:sortList(\'' . $column . '\',\'' . $order . '\')">' . $name . $img . '</a>';
        return $xhtml;
    }

    public static function cmsMessage($message)
    {
        $xhtml = '';
        if (!empty($message)) {
            $xhtml = '<dl id="system-message">
                                <dt class="' . $message['class'] . '">' . ucfirst($message['class'])  . '</dt>
                                <dd class="' . $message['class'] . ' message">
                                    <ul>
                                        <li>' . $message['content'] . '</li>
                                    </ul>
                                </dd>
                            </dl>';
        }
        return $xhtml;
    }


    public static function cmsSelectbox($name, $class, $arrValue, $keySelect = 'default', $style = null)
    {
        $xhtml = '<select style="' . $style . '" name="' . $name . '" class="' . $class . '">';
        foreach ($arrValue as $key => $value) {
            if ($key == $keySelect && is_numeric($keySelect)) {
                $xhtml .= '<option selected="selected" value="' . $key . '">' . $value . '</option>';
            } else {

                $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
            }
        }
        $xhtml .= '</select>';
        return $xhtml;
    }


    public static function cmsInput($type, $name, $id, $value, $class = null, $size = null)
    {
        $strSize = ($size == null) ? '' : "size='$size'";
        $strClass = ($class == null) ? '' : "class='$class'";
        $xhtml = "<input type='$type' name='$name' id='$id' value='$value' $strClass $strSize>";
        return $xhtml;
    }

    public static function cmsRowForm($lblName, $input, $required = false)
    {
        $strRequired = '';
        if ($required == true) $strRequired = '<span class="star">&nbsp;*</span>';
        $xhtml = '<li><label>' . $lblName . $strRequired . '</label>' . $input . '</li>';
        return $xhtml;
    }



    public static function formatDate($format, $value)
    {
        $result = '';
        if (!empty($value) && $value != '0000-00-00') {
            $result = date($format, strtotime($value));
        }
        return $result;
    }
}
