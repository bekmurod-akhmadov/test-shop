<?php
namespace frontend\controllers;

use common\models\Product;
use common\models\ProductCategory;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;

class ProductController extends Controller
{
    public $pageSize = 15;
    public function actionIndex()
    {
        $query = Product::find()->where(['status' => Product::STATUS_ACTIVE]);

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => $this->pageSize,
        ]);

        $models = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pagination' => $pagination
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;
        $session->open();

        $this->addToRecent($id);

        $recentProducts = $this->getRecentProducts($id);
         
        $relatedProducts = Product::find()
            ->where(['category_id' => $model->category_id, 'status' => Product::STATUS_ACTIVE])
            ->andWhere(['!=', 'id', $model->id])
            ->andWhere(['accessory' => Product::ACCESSORY_INACTIVE])
            ->limit(20)
            ->all();

        $additionalProducts = Product::find()
            ->where(['category_id' => $model->category_id, 'status' => Product::STATUS_ACTIVE])
            ->andWhere(['!=', 'id', $model->id])
            ->andWhere(['accessory' => Product::ACCESSORY_ACTIVE ])
            ->limit(20)
            ->all();


        return $this->render('view', [
            'model' => $model,
            'recentProducts' => $recentProducts,
            'relatedProducts' => $relatedProducts,
            'additionalProducts' => $additionalProducts,
        ]);
    }

    public function actionCategory($id)
    {
        $query = Product::find()->where(['category_id' => $id, 'status' => Product::STATUS_ACTIVE]);

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => $this->pageSize,
        ]);

        $models = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $category = ProductCategory::findOne(['id' => $id,'status' => ProductCategory::STATUS_ACTIVE]);
        return $this->render('category', [
            'models' => $models,
            'pagination' => $pagination,
            'category' => $category
        ]);
    }

    protected function findModel($id)
    {
        $model = Product::findOne(['id' => $id,'status' => Product::STATUS_ACTIVE]);
        if ($model !== null) {
            return $model;
        }
        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDiscount()
    {
        $query = Product::find()
        ->where(['status' => Product::STATUS_ACTIVE])
        ->andWhere(['IS NOT', 'discount_price', null]);

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => $this->pageSize,
        ]);

        $models = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        
        return $this->render('discount', [
            'models' => $models,
            'pagination' => $pagination
        ]);
    }

     /**
     * Joriy product ID ni sessiondagi 'recent_products' massiviga qo‘shadi.
     */
    private function addToRecent($id)
    {
        $session = Yii::$app->session;
        $session->open();

        $key = 'recent_products';
        $recent = $session->get($key, []);

        // Agar bu ID allaqachon mavjud bo‘lsa, uni o‘chiramiz (dublikat bo‘lmasin)
        if (($found = array_search($id, $recent)) !== false) {
            unset($recent[$found]);
        }

        // Yangi ID ni massiv boshiga qo‘shamiz
        array_unshift($recent, $id);

        // Faqat 10 ta oxirgi productni saqlaymiz
        $recent = array_slice($recent, 0, 10);

        $session->set($key, $recent);
    }

    /**
     * Sessiondagi 'recent_products' dagi productlarni qaytaradi (joriyni chiqarib tashlaydi)
     */
    private function getRecentProducts($currentId)
    {
        $session = Yii::$app->session;
        $session->open();

        $recentIds = $session->get('recent_products', []);

        // Joriy productni chiqarib tashlaymiz
        $recentIds = array_diff($recentIds, [$currentId]);

        if (empty($recentIds)) {
            return [];
        }

        // Bazadan olish
        return Product::find()
            ->where(['id' => $recentIds])
            ->andWhere(['status' => Product::STATUS_ACTIVE])
            ->all();
    }
}
