#官方信息
官方网站:http://www.btsnowball.org/
欢迎加入官方QQ群：146955345 联系作者:393562235@qq.com
#准备好迎接变革吧_2015.9.30
#Alpha_4_20150826已经到来。下一个大版本就是V0.7.1.0_BETA_1
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
---------------------------------------
#BTSnowball_Users和OpenID&OAuth的区别:

  OpenID侧重用户是谁而OAuth侧重对特定资源的访问。前者秉承的是一处注册处处可用的原则，出发点是”如果使用 OpenID ，你的网站地址（URI）就是你的用户名，而你的密码安全的存储在一个 OpenID 服务网站上（你可以自己建立一个 OpenID 服务网站，也可以选择一个可信任的 OpenID 服务网站来完成注册）”,以URI为核心辐射强大的用户库，OAuth的出发点则是“第三方无需使用用户的用户名与密码就可以申请获得该用户资源的授权”，辐射资源本应用强大的资源库。他们均是分发型的用户和资源共享，基于本基点进行辐射。一般有相当大的体量的应用才有足够的力量维持辐射，而且OAuth 2.0则更甚，巨头正在为自己的辐射力的扩散争得头破血流之时我们推出了BTSnowball_Users协议，它是一个“病毒式”的认证授权协议，也可以理解为OpenID+OAuth的对等变种，当用户从A应用通过BTSnowball_Users抵达B应用时，其实是完全的被复制到了当一个用户从A应用抵达B应用时（根据用户的授权）整体的被复制了过去，而敏感且又必要的信息被颠覆性的重置了（除了Email)，这些信息通过邮件的方式投送到了用户的邮箱当中，也就是说抵达B应用的其实是一个用户的复制体。按理说一切又重新开始，但由于邮箱和输出网站是一致的用户名也很可能和输出网站是一致的，而且用户又可以随时像使用OpenID和OAuth一样通过A应用来登陆B应用。也就是说用户在A和B应用中的两个用户既从开始就是完全相互独立的也是紧密绑定的，当加入了C网站时C又和A和B同时构筑了这样的关系（只要C成工驱动用户登陆A和B各一回），因为邮箱地址在BTSnowball_Users是唯一的索引强制输出的，每向后衍生一个账户都具备先前一个账户的基因，并且邮箱是一程不变的，可以理解为email和username被强制发生了OAuth行为且email还是唯一的。另外，BTSnowball_Users是协议是双向的支持一键登陆和（局部）超级SSO，整个BTSnowball网络中每一个节点只需要对自己的规则负责。可以说BTSnowball_Users启发于Bittorrent的对等网络思想，同时占有着OpenID和OAuth的精华，全程被动的思路，S2S分布式云版的OpenID+OAuth变种。
  举例说 甲在A网站有一个 [-昵称为甲-用户名为A-密码123-email地址为A@1.COM-性别为F-]的账户，当它通过BTSnowball_Users抵达B时这个账户的信息可能是[-昵称为甲-用户名为A-密码421-email地址为A@1.COM-性别为F-]而当它抵达C时[-昵称为甲-用户名为A-密码999-email地址为A@1.COM-性别为F-微博为A-贴吧昵称为A-]当它抵达D时可能[-昵称为甲-用户名为AA-密码999-email地址为A@1.COM-性别为F-微博为A-天涯论坛昵称为A-]。可见核心信息是一程不变，每一次衍生都可能被赋予了新的基因却不会干扰这个账号的核心信息，每一次衍生的新账户不仅和上一个输出应用发生了直接绑定并均可以向前匹配登陆任何一先前账户（Email唯一性），账户衍生的次数越多它的成活度就越高，总活跃度就越高。先前应用坐收每一次衍生的红利，最近一次发生向外衍生的应用得到用户价值的最多，这样让每一个应用都乐于向外衍生自己的用户。当用户的一个账户在若干应用中被多次衍生，这个账户的信息已经在用户的心中根深蒂固了，而且这个账户是对等分布式的存在于BTSnowball网络中，任何一个节点的推出都不会影响这个账户存在的稳定性。也正因为此，就算一个用户暂时不再是您应用的活跃用户，您随时都有可能重新唤醒这个用户的活跃度而这个用户也不会丢失之前在您应用上的积累，因为用户不仅仅是因为这个账户而对您的应用有印象更是因为这个账户一旦创立永远可用（除非所有衍生过的应用全部的死掉了）。而对于用户，它的邮箱地址绑定越来越多的资源，这些资源得以整合，而绑定这些资源的节点如Bittorrent的节点一般分布式且又对等的存在于这个网络当中，用户在每一个节点上却又都是独立的，任何一个节点的撤出都对用户使用其他节点上资源没有影响，用户整合的资源从垂直到广泛，越来越多的应用有机的接合到了一起共同为用户提供服务，共同维系一个用户。这已经不是一个滴水穿石的过程，这是一个滚雪球的效应，并且保证了每一个节点之间公平，这乃至BTSnowball_Users协议与OpenID&OAuth协议的最大的区别。
