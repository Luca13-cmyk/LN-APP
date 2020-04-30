<?php if(!class_exists('Rain\Tpl')){exit;}?> 
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Arquivos</p>
                      <p id="files-qntd-chart" class="card-title">0
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> Update Now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Revenue</p>
                      <p class="card-title">$ 1,345
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i> Last day
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Usuarios</p>
                      <p id="users-qntd-chart" class="card-title"><?php echo htmlspecialchars( $users_qntd, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i> Atualmente
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-single-copy-04 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Posts</p>
                      <p id="posts-qnt-chart" class="card-title">0
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats" id="posts">
                  <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#newPost">
                    <i class="nc-icon nc-simple-add"></i>Novo Post
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>



        <?php $counter1=-1;  if( isset($months_qntd) && ( is_array($months_qntd) || $months_qntd instanceof Traversable ) && sizeof($months_qntd) ) foreach( $months_qntd as $key1 => $value1 ){ $counter1++; ?>

        <input type="hidden" name="<?php echo htmlspecialchars( $value1["month"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="<?php echo htmlspecialchars( $value1["month"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-qntd="<?php echo htmlspecialchars( $value1["qntd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

        <?php } ?>






        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Comparecimento</h5>
                <p class="card-category">Contagem de 24 horas.</p>
              </div>
              <div class="card-body ">
                <canvas id=chartHours width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i>Atualizado em: <script>document.write(new Date())</script>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Estatisticas</h5>
                <p class="card-category">Ultimos dados.</p>
              </div>
              <div class="card-body ">
                <canvas id="chartEmail"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <i class="fa fa-circle text-primary"></i> Arquivos
                  <i class="fa fa-circle text-warning"></i> Usuarios
                  <!-- <i class="fa fa-circle text-danger"></i> Deleted -->
                  <i class="fa fa-circle text-gray"></i> Posts
                </div>
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar"></i> Ao longo do tempo
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card">
              
            </div>
          </div>
        </div>
        
      <!-- Modal Post -->
      <div class="modal fade" id="newPost" tabindex="-1" role="dialog" aria-hidden="false">
          <div class="modal-dialog modal-register">
              <div class="modal-content">
                <form id="submit-post" action="/new-post" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                          <label>Sistema</label>
                      <input required type="text" name="system" placeholder="Linux..." class="form-control" />
                    </div>
                    <div class="form-group">
                          <label>Assunto</label>
                      <input required type="text" name="subject" placeholder="Assunto..." class="form-control" />
                    </div>
                    <div class="form-group">
                      <label for="text">Texto</label>
                      <textarea required class="form-control" id="text" name="text" rows="3"></textarea>
                    </div>
                      <button type="submit"  class="btn btn-block btn-round">Enviar</button>
                  </div>
                  <div class="modal-footer no-border-footer">
                      <!-- <span class="text-muted  text-center"><a href="#"></a> ?</span> -->
                  </div>
                </form>
              </div>
          </div>
      </div>
      </div>
      
