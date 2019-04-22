<?php
/**
 * Created by PhpStorm.
 * User: Mizantrap
 * Date: 13.02.2019
 * Time: 15:16
 */

namespace app\components;


use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget {

    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;

    public function init() {
        parent::init();

        if ($this->tpl == null) {
            $this->tpl = 'menu';
        }

        $this->tpl .= '.php';
    }

    public function run() {
        $menu = Yii::$app->cache->get('menu');
        if ($menu) return $menu;

        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        Yii::$app->cache->set('menu', $this->menuHtml, 60);

        return $this->menuHtml;
    }

    public function getTree() {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    public function getMenuHtml($tree) {
        $str = '';

        foreach ($tree as $category) {
            $str .= $this->cutToTemplate($category);
        }
        return $str;
    }

    public function cutToTemplate($category) {
        ob_start();
        include __DIR__. '/menu_tpl/'. $this->tpl;
        return ob_get_clean();
    }

}