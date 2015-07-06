(function() {
	var re = {
		baseUrl : "D:/svncode/wap/tags/testv1/webapp/m.feiniu.com/public/static/js",
		//js路径
		dir : "D:/svncode/wap/tags/testv1/webapp/m.feiniu.com/public/static/js-build",

		//发布目录
		findNestedDependencies : false,
		//代码内部写的require也计算在打包内
		preserveLicenseComments : false,
		//去掉头部版权声明
		/*
		 * 模块
		 */
		modules : [
			{
				name : "lib/zepto",
				exclude : [  ]
			},
		/**
		 * base
		 */
		{
			name : "lib/common",
			exclude : [  ]
		},
         {
                name : "config/url",
                exclude : [ ]
        }
        ,{
            name : 'controller/about/aboutFn',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/about/collectionClause',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/about/commonProblem',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/about/jifen',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/about/serviceItem',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/about/specialAnnouncement',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/about/store',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/about/voucher',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/act/jifen',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/act/xingxiao',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/act/xingxiaoV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/cart/details',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/cart/detailsV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/cart/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/cart/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/cart',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/category/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/category/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/channel/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/channel/sort',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/detail/attribute',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/detail/coll',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/detail/groupGoods',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/detail/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/detail/index3',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/index/city',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/index/city2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/index/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/index/indexv2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/shangcheng',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/shangchengDetailAttribute',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/shangchengDetailCombineSale',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/shangchengFixSale',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/shangchengShowDesc',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/ziying',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/ziyingDetailAttribute',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/ziyingDetailCombineSale',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/ziyingFreight',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/item/ziyingShowDesc',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/lingquan/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/list/applyItem',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/list/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/list/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/login/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/login/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/addAddress',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/address/addAddressV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/address/addressV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/address/editAddressV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/address',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/buyAgain/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/card/detail',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/card/exchangeCard',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/card/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/card/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/cardlistV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/changePwd',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/changePwdV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/coupon/getCoupon',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/coupon/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/coupon/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/editAddress',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/favorites/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/gold/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/gold/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/gold/rechargeGold',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/invoice/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/invoice/index_v1',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/invoice/kaipiao',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/invoice/kaipiao_v1',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/more',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/moreV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/orderDetail',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/orderDetailV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/orderList',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/orderMx',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/oSpeed',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/oSpeedV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/sales_return/apply',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/sales_return/check',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/sales_return/complete',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/sales_return/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/sales_return/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/order/sales_return/progress',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/phone/bindNewPhone',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/phone/bindNewPhoneV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/phone/bindPhone',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/phone/bindPhoneV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/phone/changeBindPhone',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/phone/changeBindPhoneV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/point',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/recharge/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/recharge/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/redenvelope/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/voucher/exchangeVoucher',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/voucher/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/voucher/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/my/voucher/voucherDetail',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/address/add',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/address/addV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/address/edit',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/address/editV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/address/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/address/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/onsaleCard',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/onsaleCardV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/payment',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/paymentV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/store/list',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/store/receiver',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/store/search',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/submit_a',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/order/submit_success',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_choose_phone',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_choose_phoneV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_email',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_emailV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_phone',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_phoneV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_send_verify',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_send_verifyV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_set_password',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/forget_set_passwordV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/forget/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/indexV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/password_phone',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/password_phoneV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/verify_phone',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/register/verify_phoneV2',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/search/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/seckill/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/seckill/miji',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/seckill/msover',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/store/allgoods',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/store/newgoods',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/token',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/tuan/index',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/tuan/list',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/tuan/sub',
            exclude : [ 'lib/common' ]
        },{
            name : 'controller/weixin/index',
            exclude : [ 'lib/common' ]
        }

        ],
		/*
		 * 自动删除被合并过的文件
		 */
		removeCombined : false
	/*
	,
	optimize : "none"
	*/
	}
	return re;
})()