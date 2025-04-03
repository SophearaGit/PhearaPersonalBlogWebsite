   <div>
       <!--Start Postfolio Details Section-->
       <section>
           <div class="container">
               <div class="row">
                   <div class="col-lg-3">
                       <div class="cs_category cs_style_2 cs_white_bg cs_radius_10">
                           <div class="cs_social cs_style_1 d-flex align-items-center cs_gap_25">
                               <div class="cs_social_title cs_font_20 cs_semi_bold">Share:</div>
                               <div class="cs_social_wrap d-flex cs_gap_15">
                                   <a href="#"><svg width="9" height="16" viewBox="0 0 9 16" fill="none"
                                           xmlns="http://www.w3.org/2000/svg">
                                           <path
                                               d="M8.00781 9L8.45219 6.10437H5.67375V4.22531C5.67375 3.43313 6.06188 2.66094 7.30625 2.66094H8.56937V0.195625C8.56937 0.195625 7.42313 0 6.32719 0C4.03906 0 2.54344 1.38688 2.54344 3.8975V6.10437H0V9H2.54344V16H5.67375V9H8.00781Z"
                                               fill="#1B74E4"></path>
                                       </svg>
                                   </a>
                                   <a href="#"><svg width="19" height="15" viewBox="0 0 19 15"
                                           fill="none" xmlns="http://www.w3.org/2000/svg">
                                           <path
                                               d="M18.4588 1.76471C17.7794 2.07353 17.0471 2.27647 16.2882 2.37353C17.0647 1.90588 17.6647 1.16471 17.9471 0.273529C17.2147 0.714706 16.4029 1.02353 15.5471 1.2C14.85 0.441177 13.8706 0 12.7588 0C10.6853 0 8.99118 1.69412 8.99118 3.78529C8.99118 4.08529 9.02647 4.37647 9.08823 4.65C5.94706 4.49118 3.15 2.98235 1.28824 0.697059C0.961765 1.25294 0.776471 1.90588 0.776471 2.59412C0.776471 3.90882 1.43824 5.07353 2.46176 5.73529C1.83529 5.73529 1.25294 5.55882 0.741177 5.29412C0.741177 5.29412 0.741177 5.29412 0.741177 5.32059C0.741177 7.15588 2.04706 8.69118 3.77647 9.03529C3.45882 9.12353 3.12353 9.16765 2.77941 9.16765C2.54118 9.16765 2.30294 9.14118 2.07353 9.09706C2.55 10.5882 3.93529 11.7 5.60294 11.7265C4.31471 12.75 2.68235 13.35 0.9 13.35C0.6 13.35 0.3 13.3324 0 13.2971C1.67647 14.3735 3.67059 15 5.80588 15C12.7588 15 16.5794 9.22941 16.5794 4.22647C16.5794 4.05882 16.5794 3.9 16.5706 3.73235C17.3118 3.20294 17.9471 2.53235 18.4588 1.76471Z"
                                               fill="#1D9BF0"></path>
                                       </svg>
                                   </a>
                                   <a href="#"><svg width="16" height="16" viewBox="0 0 16 16"
                                           fill="none" xmlns="http://www.w3.org/2000/svg">
                                           <path
                                               d="M3.58151 16H0.264292V5.31762H3.58151V16ZM1.92111 3.86044C0.860376 3.86044 0 2.98185 0 1.92111C7.59231e-09 1.4116 0.202402 0.92296 0.562681 0.562681C0.92296 0.202403 1.4116 0 1.92111 0C2.43062 0 2.91927 0.202403 3.27955 0.562681C3.63982 0.92296 3.84223 1.4116 3.84223 1.92111C3.84223 2.98185 2.98149 3.86044 1.92111 3.86044ZM15.9968 16H12.6867V10.7999C12.6867 9.56057 12.6617 7.97125 10.962 7.97125C9.23735 7.97125 8.97305 9.31771 8.97305 10.7106V16H5.65941V5.31762H8.84091V6.77479H8.88734C9.3302 5.93549 10.412 5.04976 12.026 5.04976C15.3832 5.04976 16.0004 7.26052 16.0004 10.132V16H15.9968Z"
                                               fill="#0A66C2"></path>
                                       </svg>
                                   </a>
                               </div>
                           </div>
                           <ul class="cs_mp_0">
                               <li class="{{ $tab == 'overview' ? 'active' : '' }}">
                                   <a href="#overview" wire:click="selecttab('overview')"
                                       onclick="event.preventDefault();">Overview</a>
                               </li>
                               @if ($portfolio->project_challenge != null)
                                   <li class="{{ $tab == 'project_challenge' ? 'active' : '' }}">
                                       <a href="#project_challenge" wire:click="selecttab('project_challenge')"
                                           onclick="event.preventDefault();">Project
                                           Challenge</a>
                                   </li>
                               @endif
                               @if ($portfolio->design_research != null)
                                   <li class="{{ $tab == 'design_research' ? 'active' : '' }}">
                                       <a href="#design_research" wire:click="selecttab('design_research')"
                                           onclick="event.preventDefault();">
                                           Design Research
                                       </a>
                                   </li>
                               @endif
                               @if ($portfolio->design_approach != null)
                                   <li class="{{ $tab == 'design_approach' ? 'active' : '' }}">
                                       <a href="#design_approach" wire:click="selecttab('design_approach')"
                                           onclick="event.preventDefault();">
                                           Design Approach</a>
                                   </li>
                               @endif
                               @if ($portfolio->the_solution != null)
                                   <li class="{{ $tab == 'the_solution' ? 'active' : '' }}">
                                       <a href="#the_solution" wire:click="selecttab('the_solution')"
                                           onclick="event.preventDefault();">
                                           The Solutions</a>
                                   </li>
                               @endif
                           </ul>
                       </div>
                       <div class="cs_height_lg_30"></div>
                   </div>
                   <div class="col-lg-9">
                       <div class="cs_pl_70">
                           <div class="cs_portfoli_details cs_style_1 tab-pane fade {{ $tab == 'overview' ? 'show active' : '' }}"
                               id="overview" role="tabpanel">
                               <h2 class="cs_portfolio_title cs_font_48 {{ $tab == 'overview' ? '' : 'd-none' }}">
                                   Overview</h2>
                               <p class="cs_portfolio_text {{ $tab == 'overview' ? '' : 'd-none' }}">
                                   {{ $portfolio->overview }}
                               </p>
                               @if ($portfolio->strategy == null && $portfolio->project_type == null && $portfolio->client == null)
                               @else
                                   <div class="cs_portfolio_details_wrap row {{ $tab == 'overview' ? '' : 'd-none' }}">
                                       @if ($portfolio->strategy == null)
                                       @else
                                           <div class="col-md-4">
                                               <h4 class="cs_font_20 m-0">Stratagy</h4>
                                               <p class="m-0">
                                                   {{ $portfolio->strategy }}
                                               </p>
                                           </div>
                                       @endif
                                       @if ($portfolio->project_type == null)
                                       @else
                                           <div class="col-md-4">
                                               <h4 class="cs_font_20 m-0">Project Type</h4>
                                               <p class="m-0">
                                                   {{ $portfolio->project_type }}
                                               </p>
                                           </div>
                                       @endif
                                       @if ($portfolio->client == null)
                                       @else
                                           <div class="col-md-4">
                                               <h4 class="cs_font_20 m-0">Client</h4>
                                               <p class="m-0">
                                                   {{ $portfolio->client }}
                                               </p>
                                           </div>
                                       @endif
                                   </div>
                               @endif
                               @if ($tab == 'overview')
                                   {!! $portfolio->content !!}
                               @endif
                           </div>
                           <div class="cs_portfoli_details cs_style_1 tab-pane fade {{ $tab == 'project_challenge' ? 'show active' : '' }}"
                               id="project_challenge" role="tabpanel">
                               @if ($tab == 'project_challenge')
                                   {!! $portfolio->project_challenge !!}
                               @endif
                           </div>
                           <div class="cs_portfoli_details cs_style_1 tab-pane fade {{ $tab == 'design_research' ? 'show active' : '' }}"
                               id="design_research" role="tabpanel">
                               @if ($tab == 'design_research')
                                   {!! $portfolio->design_research !!}
                               @endif
                           </div>
                           <div class="cs_portfoli_details cs_style_1 tab-pane fade {{ $tab == 'design_approach' ? 'show active' : '' }}"
                               id="design_approach" role="tabpanel">
                               @if ($tab == 'design_approach')
                                   {!! $portfolio->design_approach !!}
                               @endif
                           </div>
                           <div class="cs_portfoli_details cs_style_1 tab-pane fade {{ $tab == 'the_solution' ? 'show active' : '' }}"
                               id="the_solution" role="tabpanel">
                               @if ($tab == 'the_solution')
                                   {!! $portfolio->the_solution !!}
                               @endif
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="cs_height_145 cs_height_lg_75"></div>
       </section>
       <!--End Postfolio Details Section-->
   </div>
