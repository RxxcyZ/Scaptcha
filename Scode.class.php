<?php
/**
 * @Author: 苏羽羽
 * @Date:   2018-03-10 22:05:24
 * @E-mail: suyuyuc@gmail.com
 * @Blog: 	https://www.suyuyu.com
 * @Last Modified by:   苏羽羽
 * @Last Modified time: 2018-03-10 22:50:37
 */

session_start();
/**
 * 人类验证，与传统的验证码同一原理。
 * 随机生成2个数字，填写表单时候计算正确才可以通过验证。
 */
class Scaptcha
{	
	//最小数
	protected $min = 0;
	//最大数
	protected $max = 10;
	//值
	protected $answer = null;
	//生成的式子
	protected $quesion;
	//用户输入
	public $inputRes = null;
	
	//存入session
	public function setScode() {
		//调用buildScode()方法生成验证码
		$this->buildScode();
		//将验证码存入session
		$_SESSION['answer'] = $this->answer;
		return $this->quesion;
	}

	//建立式子
	public function buildScode() {
		$x = rand($this->min,$this->max);
		$y = rand($this->min,$this->max);
		$this->quesion = $x."+".$y."= ?";
		$this->answer = $x + $y;
	}

	//比对验证码
	public function checkScode() {
		if ($this->inputRes == $_SESSION['answer']) {
			//验证成功直接返回true
			return true;
			//清除session
			session_destroy();
		}else{
			//验证失败返回标示、信息
			return ['status'=>0,'msg'=>'验证码错误'];
		}
	}
}
