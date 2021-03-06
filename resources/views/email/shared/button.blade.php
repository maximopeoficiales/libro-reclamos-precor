@php
   $color = lrp_getColorBase();
@endphp
<div align="center" class="button-container" style="
                            padding-top: 10px;
                            padding-right: 10px;
                            padding-bottom: 10px;
                            padding-left: 10px;
                          ">
    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:31.5pt;width:138.75pt;v-text-anchor:middle;" arcsize="10%" stroke="false" fillcolor="{{ $color }}"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
    <div style="              margin-bottom: 10px;
                              text-decoration: none;
                              display: inline-block;
                              color: #ffffff;
                              background-color: {{ $color }};
                              border-radius: 4px;
                              -webkit-border-radius: 4px;
                              -moz-border-radius: 4px;
                              width: auto;
                              width: auto;
                              border-top: 1px solid {{ $color }};
                              border-right: 1px solid {{ $color }};
                              border-bottom: 1px solid {{ $color }};
                              border-left: 1px solid {{ $color }};
                              padding-top: 5px;
                              padding-bottom: 5px;
                              font-family: Arial, Helvetica Neue, Helvetica,
                                sans-serif;
                              text-align: center;
                              mso-border-alt: none;
                              word-break: keep-all;
                            ">
        <span style="
                                padding-left: 20px;
                                padding-right: 20px;
                                font-size: 16px;
                                display: inline-block;
                                letter-spacing: undefined;
                              "><span style="
                                  font-size: 16px;
                                  line-height: 2;
                                  word-break: break-word;
                                  mso-line-height-alt: 32px;
                                "><strong><a href="{{ get_reclamoDetalle($reclamo->id) }}"
                        style="text-decoration: none; color: white">Consultar Reclamo</a></strong></span></span>
    </div>
    <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
