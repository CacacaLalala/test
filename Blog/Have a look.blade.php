
<!DOCTYPE html>
<html>

   <head>
 <!--   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Top Navigation</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">


    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Top Navigation
                    <small>Example 2.0</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/laravel-master/maggie/public/start"><i class="fa fa-dashboard"></i> Start</a></li>
                    <li><a href="/laravel-master/maggie/public/article/formyself">Your Blog</a></li>
                    <li class="active">Top Navigation</li>
                </ol>
            </section>

            <!-- Main content -->
            @foreach($articles as $article)
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Box Comment -->
                        <div class="box box-widget">
                            <div class="box-header with-border">

                                <div class="user-block">
                                    <img class="img-circle" src="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/dist/img/user1-128x128.jpg" alt="User Image">
                                    <span class="username"><a href="#">{{$article->author}}</a></span>
                                    <span class="description">{{$article->updated_at}}</span>
                                </div>

                                <!-- /.user-block -->

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- post text -->
                                <p>{{$article->content}}</p>

                                <!-- /.attachment-block -->

                                <!-- Social sharing buttons -->
                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer box-comments">
                                <div class="box-comment">
                                    <!-- User image -->
                                    <img class="img-circle img-sm" src="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/dist/img/user3-128x128.jpg" alt="User Image">
                                    @foreach($comments as $comment)
                                        @if($comment->blog_id==$article->uid)
                                    <div class="comment-text">
                        <span class="username">{{$comment->comment_id}}</span>
                        <span class="text-muted pull-right">{{$comment->create_at}}</span>
                          <span >{{$comment->content}}</span>
                                    </div>
                                        @endif
                                    @endforeach
                                    <!-- /.comment-text -->
                                </div>

                            </div>

                            <!-- /.box-footer -->
                            <div class="box-footer">
                                <form action="{{url('/article/comment')}}{{'/'.$article->uid}}" method="post">
                                    {{csrf_field()}}
                                    <img class="img-responsive img-circle img-sm" src="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/dist/img/user4-128x128.jpg" alt="Alt Text">
                                    <!-- .img-push is used to add margin to elements next to floating images -->

                                        <input type="text" class="form-control input-sm" placeholder="Press enter to post comment" name="content"/>
                                        <input type="submit" name="comment"  value="Submit"/>

                                </form>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
        @endforeach
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.8
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/laravel-master/maggie/public/AdminLTE-2.3.11/AdminLTE-2.3.11/dist/js/demo.js"></script>
</body>
</html>
