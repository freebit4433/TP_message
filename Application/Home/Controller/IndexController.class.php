<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util\AjaxPage;
class IndexController extends Controller {
    public function _initialize(){
        if (session('?isLogin')) {
            if (session('isLogin')) {
                return true;
            }else{
                $this->redirect('Login/index');
            }
        }else{
            $this->redirect('Login/index');
        }
    }

    public function index(){
        $userName = session('username');
        $this->assign('username',$userName);
        $this->display();
    }

    public function logout(){
        session('[destroy]');
        $this->redirect('Login/index');
    }

    public function submit(){
        if (!IS_POST) {
            $this->error('拒绝访问！','../Login/index',1);
        }else{
            //add数据
            $commentTable = M('table2comment');
            $data['username'] = session('username');
            $data['comment'] = I('post.comment','');
            $data['commenttime'] = time();
            $res = $commentTable->data($data)->add();
            if ($res) {
                $txData['flag'] = true;
                $txData['id'] = $res;
            }else{
                $txData['flag'] = false;
            }
            //当数据添加多于60条，删除40条
            if($commentTable->count() > 60){
                $idCount = $commentTable->field('id')->limit(40)->select();
                if($idCount){
                    $idMax = $idCount[39]['id'];
                    $condition['id'] = array('lt',$idMax);
                    $commentTable->where($condition)->delete();
                }
            }
            $this->ajaxReturn($txData,'json'); 
        }
    }

    public function refresh(){
        $commentTable = M('table2comment');
        $count = $commentTable->count();
        $page = new AjaxPage($count,10,'refresh');
        $pageData = $page->show();

        $commentData = $commentTable->alias('c')->field('c.id,c.username,c.commenttime,c.comment,table2user.imgnum,table2user.webpage')->limit($page->firstRow,$page->listRows)->join('LEFT JOIN table2user ON c.username = table2user.username')->order('c.commenttime desc')->select();
        foreach ($commentData as $rowNum => $rowData) {
            date_default_timezone_set('PRC');
            $commentData[$rowNum]['commenttime'] = date("Y年m月d日 H:i:s",$commentData[$rowNum]['commenttime']);

            /*$condition['username'] = $commentData[$rowNum]['username'];
            $userData = M('table2user')->field('imgnum,webpage')->where($condition)->select();
            $commentData[$rowNum]['imgnum'] = $userData[0]['imgnum'];
            $commentData[$rowNum]['webpage'] = $userData[0]['webpage'];*/
        }
        $commentData['pagedata'] = $pageData;
        $this->ajaxReturn($commentData,'json');
    }

    public function delete(){
        if (!IS_POST) {
            $this->error('拒绝访问！','../Login/index',1);
        }else{
            $deleteId = I('post.deleteid',null);
            $condition['id'] = $deleteId;
            $res = M('table2comment')->where($condition)->delete();
            $txData['flag'] = $res;
            $this->ajaxReturn($txData,'json');
        }
    }

}