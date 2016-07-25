  <?php $baseurl = base_url('asisten'); ?>
 <div id="nav">
                <nav ui-nav>
                  <ul class="nav">
                    <li class="nav-header m-v-sm hidden-folded">
                      Menu Navigasi
                    </li>
                    <li>
                      <a md-ink-ripple href="<?php echo $baseurl; ?>/home">
                        <i class="icon mdi-action-home i-20"></i>
                        <span class="font-normal">Beranda</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="icon mdi-action-assignment i-20"></i>
                        <span class="font-normal">Maintenance</span>
                      </a>
                        <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/maintenancehardware">Maintenance Hardware</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/maintenancesoftware">Maintenance Software</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a md-ink-ripple href="<?php echo $baseurl; ?>/maintenance">
                        <i class="icon mdi-device-devices i-20"></i>
                        <span class="font-normal">Form Tindak Lanjut</span>
                      </a>
                    </li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>