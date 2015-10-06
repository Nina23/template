<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'title_lat', 'title_en', 'url', 'order', 'parent_id', 'type', 'option', 'is_published', 'lang'];


    public function generateMenu($menu, $parentId = 0) {

        $result = null;

        foreach($menu as $item) {

            if($item->parent_id == $parentId) {

                $imageName = ($item->is_published) ? "publish_16x16.png" : "not_publish_16x16.png";

                $result .= "<li class='dd-item' data-id='{$item->id}'>
                <button type='button' data-action='collapse'>Collapse</button>
                <button type='button' data-action='expand' style='display: none;'>Expand</button>
			    <div class='dd-handle'></div>
			        <div class='dd-content'><span>{$item->title}</span>

			    </div>" . $this->generateMenu($menu, $item->id) . "
			</li>";
            }
        }

        return $result ? "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
    }

    public function getMenuHTML($items) {

        return $this->generateMenu($items);
    }


    public function parseJsonArray($jsonArray, $parentID = 0) {

        $return = array();

        foreach($jsonArray as $subArray) {

            $returnSubArray = array();

            if(isset($subArray['children'])) {
                $returnSubArray = $this->parseJsonArray($subArray['children'], $subArray['id']);
            }

            $return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
            $return = array_merge($return, $returnSubArray);
        }
        return $return;
    }

    public function changeParentById($data) {

        foreach($data as $k => $v) {

            $item = $this->find($v['id']);
            $item->parent_id = $v['parentID'];
            $item->order = $k + 1;
            $item->save();

        }
    }

}