
          <!-- Main Footer -->
          <footer class="main-footer">
               <strong>Copyright &copy; 2010 - {{ date("yy", strtotime (now())) }} <a href=" {{ asset("Auth-Panel")  }}/https://adminlte.io">Laravel do Zero</a>.</strong>
               Todos os direitos reservados para LF System.
               <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> {{ $branch ?? "No-Version" }}
               </div>
          </footer>
