 <?php $baseurl = base_url('staff'); ?>
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
                        <i class="icon mdi-device-storage i-20"></i>
                        <span class="font-normal">Mastering</span>
                      </a>
                        <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/kategoribarang">Kategori Barang</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/unit">Unit</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/barang">Barang</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/laboratorium">Laboratorium</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/tampiltahun">Tahun</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/jadwal">Jadwal</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/manajemenuser">User</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a md-ink-ripple href="<?php echo $baseurl; ?>/penerimaanbarang">
                        <i class="icon mdi-file-file-download i-20"></i>
                        <span class="font-normal">Penerimaan Barang</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple href="<?php echo $baseurl; ?>/penyerahanbarang">
                        <i class="icon mdi-file-file-upload i-20"></i>
                        <span class="font-normal">Penyerahan Barang</span>
                      </a>
                    </li>
                     <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="icon mdi-action-assignment i-20"></i>
                        <span class="font-normal">Inventaris Barang</span>
                      </a>
                        <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/inventarisbarang">Data Inventaris Barang</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/totalinventarisbarang">Total Inventaris Barang</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="icon mdi-action-autorenew i-20"></i>
                        <span class="font-normal">Transaksi Barang</span>
                      </a>
                        <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/transaksipenempatan">Trans. Penempatan</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="<?php echo $baseurl; ?>/transaksimutasi">Trans. Mutasi</a>
                        </li>
                      </ul>
                    </li>
                     <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="icon mdi-action-print i-20"></i>
                        <span class="font-normal">Laporan</span>
                      </a>
                        <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href>
                           <span class="pull-right text-muted">
                              <i class="fa fa-caret-down"></i>
                            </span>
                            <span class="font-small">Lap. Penyerahan</span>
                            <ul class="nav nav-sub">
                            <li>
                              <a md-ink-ripple href="<?php echo $baseurl; ?>/laporanpenyerahanpertahun">Lap. Per Tahun</a>
                            </li>
                            <li>
                              <a md-ink-ripple href="<?php echo $baseurl; ?>/transaksipenempatan">Lap. Per Bulan</a>
                            </li>
                          </ul>         
                          </a>
                        </li>
                        <li>
                          <a md-ink-ripple href>
                           <span class="pull-right text-muted">
                              <i class="fa fa-caret-down"></i>
                            </span>
                            <span class="font-small">Lap. Penerimaan</span>
                            <ul class="nav nav-sub">
                            <li>
                              <a md-ink-ripple href="<?php echo $baseurl; ?>/laporanpenerimaanpertahun">Lap. Per Tahun</a>
                            </li>
                            <li>
                              <a md-ink-ripple href="<?php echo $baseurl; ?>/laporanpenerimaanperbulan">Lap. Per Bulan</a>
                            </li>
                          </ul>         
                          </a>
                        </li>
                         <li>
                          <a md-ink-ripple href>
                           <span class="pull-right text-muted">
                              <i class="fa fa-caret-down"></i>
                            </span>
                            <span class="font-small">Lap. Stok Akhir</span>
                            <ul class="nav nav-sub">
                            <li>
                              <a md-ink-ripple href="<?php echo $baseurl; ?>/transaksimutasi">Lap. Per Tahun</a>
                            </li>
                            <li>
                              <a md-ink-ripple href="<?php echo $baseurl; ?>/transaksimutasi">Lap. Per Bulan</a>
                            </li>
                          </ul>         
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>