<?php
/**
 * tipo 2: role
 */
class AuthController extends Controller
{
    public function actionIndex()
    {
        Yii::app()->authManager->createRole('categoria-admin');
        Yii::app()->authManager->assign('categoria-admin', 1);
    }

    public function actionOperaciones()
    {
        $auth = Yii::app()->authManager;

        $auth->createOperation('categoria-listar', 'Lista las categorías');
        $auth->createOperation('categoria-editar', 'Edita las categorías');
        $auth->createOperation('categoria-eliminar', 'Elimina las categorías');
        $auth->createOperation('categoria-crear', 'Crea las categorías');
        $auth->createOperation('categoria-administrar', 'Ve la tabla de administraicón de categorías');
    }
}