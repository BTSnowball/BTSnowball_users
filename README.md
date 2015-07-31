#官方信息
官方网站:http://www.btsnowball.org/
官方QQ群：146955345
# BTSnowball_users
  BTSnowball_Users可以让您的网站、应用等互联网服务和其它服务者的网站、应用等互联网服务实现用户双向交互，任何一个用户可以从任何一个执行BTSnowball_Users协议的网站、应用等互联网服务登陆至任何一个另一个规则匹配的执行BTSnowball_Users协议的网站、应用等互联网服务，并基于Email地址在它们之间形成绑定关系。
  BTSnowball_Users是基于点对点思想设计的去中心化系统，相当于搭建了一个分布式的云开放平台，它由所有执行BTSnowball_Users协议的节点（网站、应用或其它服务）组成，他们之间的关系是对等的，任何一个节点均可以自由的退出自由的加入并不对其它节点产生干扰，每个节点均只对自己负责。这好比在QQ登陆开放平台中，每一个节点都是QQ的角色又是被授权应用的角色，同时关系对等而又完全去中心化。任何加入这个网络的网站/应用，都可以将自己的服务和资源以及整个云网络的服务和资源有机的接合在一起，对等公平。
  BTSnowball_Users是BTSnowball系列协议之一，同名开源程序BTSnowball_Users是该协议的实现。
#注意！这是主程序，主程序必须结合相应的接合程序（我们称之为BTSUHand）才能正常运行！
#在哪里找到Hand(BTSUHand）已完成\示例\SDK
  https://github.com/BTSnowball/BTSnowball_Users_Hand   请到这里下载相应的文件包
# BTSnowball_users简介
BTSnowBall_Users简介 Introduction of BTSnowBall _Users
一、概述
  BTSnowBall(Users）是一个是分布式的，点对点的用户登陆认证&授权协议。相当于一个云开放平台中的用户登陆授权部分，可以实现不同的网站/应用（及设备）之间用户的双向登陆授权及关联。
  *BTSnowBall_Users于@GitHub的同名仓库是BTSnowBall(Users）的PHP实现。采用BTSpl授权协议开源发布。
二、使用BTSnowBall_Users能实现什么
  每一个网站/应用都可以使用BTSnowBall_Users协议搭建一个基于BTSnowBall协议的自己的开放平台，开放用户使用在本网站/应用的帐号登陆其它同样执行BTSnowBall_Users协议的网站/应用，同时其它执行BTSnowBall（Users）的网站/应用的用户也可以使用他们在其它地方的帐号同理登入本网站/应用。
三、运行原理
  BTSnowBall_Users是完全分布式的，基于对等网络原理运行的。其中每一个个体都是独立且本着只对自己负责的原则独立运行的。应答模式是完全被动的，每一个BTSnowBall_Users连接都不需要任何来自第三方的数据凭证（譬如证书等），按照协议规范流程执行即可完成整个BTSnowBall_Users连接。
  一般时间所有BTSnowBall（Users）个体都处于监听状态，当有一名用户要发起一次连接，BTSnowBall_Users主引擎才会发起一次，主动连接。一次BTSnowBall_Users主动连接由若干个被动应答的小链接组成，整个连接过程包含了，呼叫、口令握手、合法性校验、数据传送等部分。
  整个BTSnowBall_Users网络安全可靠，不会因任何一个个体的撤出而造成影响。对于在BTSnowBall_Users网络上活跃的每一个独立用户名，只要有一个个体在为它提供服务那它就可以稳定的存在于BTSnowBall_Users协议网络之中。Email作为索引键，对用户名的复制及关联提供保障，同时它具备为用户在BTSnowBall_Users网络上的任何一个个体执行密码取回操作提供了一条可靠的通路。
四、反垃圾地址机制
  BTSnowBall（Users）协议的PHP实现采用黑名单机制来进行垃圾地址信息的反制。同时BTSnowBall_Users附带了一种黑名单罗列格式，我们通过站云机制来向大家提供最新的黑名单版本。同样任何人都可以自建站云，甚至将站云服务端整合到自己的BTSnowBall_Users当中去来为他人共享自己的黑名单。任何都可以从自己信任的站云那里对自己的黑名单库进行更新，信任的网站/应用之间也可以相互引导更新。黑名单分为邮件地址黑名单和域名地址黑名单，分别负责对垃圾用户和垃圾网站/应用的屏蔽。
五、BTSnowBall_Users协议全文
  见《BTSnowBall_Users》。
六、BTSnowBall_Users能带来什么
  BTSnowBall_Users协议使得贵网站/应用自建开放平台并和大量其它网站/应用通信成为可能。使得网站/应用与网站/应用之间可以实现无前置约定通信，进行用户的登陆认证及授权。现在用户可以使用在您的网站/应用的用户名并以贵网站/应用作为基点登陆其它网站/应用了。您可以驱动用户输出，与更多的网站/应用构筑顺水且互相平等合作关系，使得双方的资源和服务得以有机的整合，联合服务于自然人用户，收获用户名的活跃度的提升、成活率和健康率的提升、提升贵网站/应用的品牌认可度及用户忠诚度。您可以接收更多合理且自然的新用户，并构筑更多的顺水且互相平等的合作关系，收获更多的价值。您可以引导用户的输出流向，构筑多个预想的合作圈。
  同时在整个BTSnowBall_Users网络中的所有网站/应用都是本着对自己负责的原则，在BTSnowBall协议框架下对外制定自己的接入规则，任何与之相匹配的应用/网站都可以直接构筑互联关系，由用户行为驱动最大限度的挖掘共赢潜力。
  BTSnowBall_Users构筑了一个应用级的开放的云网络，任何加入这个网络的网站/应用，都可以将自己的服务和资源以及整个云网络的服务和资源有机的接合在一起。使得自己能收获更多的用户名的活跃度的提升、成活率和健康率的提升、贵网站/应用品牌认可度的提升、用户忠诚度、合作关系圈及强有力发展的驱动。

-

本文档遵循相应的文档共享协议（CC_BY-SA)共享（开源）发布。©Copyright BY 作者：林友哲 （@BTSnowball.Org） 版权所有.
-
Introduction of BTSnowBall _Users
1.Overview
BTSnowBall_Usersis a distributed and point-to-point agreement of authentication & authorization for users logging in. It is the same part of authentication for users logging in as on open cloud platform, which can fulfill users’two-way logging authentication and connection among various websites / applications (and devices).
The corresponding storage of *BTSnowBall_Users at @GitHub is the fulfillment of PHP of BTSnowBall_Users. It uses BTSpl authentication agreement for open source and publishing.
2.Achievement by Using BTSnowBall_Users
    Each website/application is able to build up its own open platform based on BTSnowBall agreement by using it, open users can use the user name of this website/application to log in others which are also based on BTSnowBall agreement, and vise versa.
3.Operation Principle
   BTSnowBall_Users operates in a completed distributed manner based on reciprocity network principle. Within it each individual is independent and solely operating in the principle of self-responsible. The response mode is completedpassive, each BTSnowBall_Users connection doesn’t need any data certification (like certificate) from third party, the whole BTSnowBall_Users connection can be doneaccording to the procedure in agreement standard.
   Generally all BTSnowBall_Usersitem is under monitoring condition, the main engine of BTSnowBall_Users will launch active connection only when one userlaunches one connection. One active connection of BTSnowBall_Users consists ofseveral small connections of passive response, which includes calling, challenge handshake, validity verification, data transfer etc.
   The whole BTSnowBall_Users network is safe and reliable, it will not be affected by the withdraw of any single item. For each independent user name active in BTSnowBall_Users network, it can exist in BTSnowBall_Users agreement network in stable condition as long as there is one item providing service. As the index key, Email provide guaranty for duplication and connection, meanwhile it is able to provide a reliable path for users executing passwords retrieving in any item of BTSnowBall_Users network. 
4.Anti-Trash Address System
   BTSnowBall_Users协议的PHP实现采用黑名单机制来进行垃圾地址信息的反制。同时BTSnowBall_Users附带了一种黑名单罗列格式，我们通过站云机制来向大家提供最新的黑名单版本。同样任何人都可以自建站云，甚至将站云服务端整合到自己的BTSnowBall_Users当中去来为他人共享自己的黑名单。任何都可以从自己信任的站云那里对自己的黑名单库进行更新，信任的网站/应用之间也可以相互引导更新。黑名单分为邮件地址黑名单和域名地址黑名单，分别负责对垃圾用户和垃圾网站/应用的屏蔽。PHP of BTSnowBall_Users agreement fulfills the counter-restriction of trash address information by using blacklist system. Meanwhile BTSnowBall_Users attaches a blacklist enumerating format, we provide the latest version of blacklist to users through site cloud system. Also any user can set up the cloud by themselves and even integrate the site cloud server in own BTSnowBall_Users for sharing blacklist for other users. Any user is able to update their own blacklist library from their trusted site cloud, and trusted websites/applications can guide for update between each other. The blacklist consists of email address blacklist and domain name address, which are responsible for shielding of trash users and trash websites/applications. 
5.BTSnowBall_Users Agreement
See BTSnowBall_Users.
6.What Can BTSnowBall_Users Bring
    BTSnowBall_Users Agreement make it possible for website/application building up own open platform and communicating with other websites/applications. It makes non-preposition agreement communication among websites/applications come true for authentication and authorization of users logging in. Now users are able to log in other websites/applications by using the user name of your website/application as base point. You can drive users output and build up cooperation relation ofcompliance and equality with more websites/applications, so that it can make organic integration of both source and service, united serving for natural person users to receive the raising of users’ activeness, survival rate and health rate, and raise recognition of brand and loyalty of users of your website/application. You can receive more reasonable and natural new users and build up more cooperation relation ofcompliance and equality and receive more value. You can guide the output flow of users and build up multiple preconceived cooperation circles.
At the same time all websites/applications in entire BTSnowBall_Users network are making own connection rules under BTSnowBall agreement framework in the principle of self-responsible, any matched website/application can directly build up interconnection relation, and letting users activities dig win-win potential in maximum.
BTSnowBall_Users has built up an open cloud network of application level, any website/application joining this network can organically connect own service and source with that in entire cloud network. So that it can receive more raising of users’activeness, survival rate and health rate, and raising of recognition of brand and loyalty of users and strong development force.
 

©Copyright BY 林友哲 LinYouzhe Translation BY 贾一盟 JiaYimeng
