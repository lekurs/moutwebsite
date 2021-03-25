{{--<style>--}}
{{--    table {--}}
{{--        width: 100%;--}}
{{--        /*font-family: aristaproalternate;*/--}}
{{--        /*border: 1px solid red;*/--}}
{{--    }--}}

{{--    h2 {--}}
{{--        margin: 0;--}}
{{--        padding: 0;--}}
{{--        font-weight: bold;--}}
{{--        font-size: 18px;--}}
{{--        text-transform: uppercase;--}}
{{--        margin-bottom: 10px;--}}
{{--    }--}}

{{--    h3 {--}}
{{--        font-weight: bold;--}}
{{--        margin: 0;--}}
{{--        padding: 0;--}}
{{--        font-size: 13px;--}}
{{--    }--}}

{{--    td.height-line {--}}
{{--        height: 12px;--}}
{{--        margin: 0;--}}
{{--        padding: 0;--}}
{{--        font-size: 12px;--}}
{{--    }--}}

{{--    .bolder-txt {--}}
{{--        font-weight: 700;--}}
{{--    }--}}

{{--</style>--}}
{{--<page backtop="10mm" backbottom="20mm">--}}
{{--    <page_header>--}}
{{--        <img src="{{ base_path('public/images/logo-mout-factures.png') }}" style="width: 190mm; height: 140px; text-align: left; margin-left: -10mm; margin-top:-5mm">--}}
{{--    </page_header>--}}
{{--    <page_footer>--}}
{{--        <table id="footer-bill" cellpadding="0" cellspacing="0" border="0">--}}
{{--            <tr>--}}
{{--                <td class="height-line" style="width: 100%; text-align: center">MOUT</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="height-line" style="width: 100%; text-align: center">moutwebagency.com</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="height-line" style="width: 100%; text-align: center">06 62 45 10 36 / 06 70 06 11 07</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="height-line" style="width: 100%; text-align: center">84 rue de Versailles / 78 150 Le Chesnay</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="height-line" style="width: 100%; text-align: center">SIREN : 842 793 648 / Code APE 6312Z</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="height-line" style="width: 100%; text-align: center">SAS au capital social de 2000 €</td>--}}
{{--            </tr>--}}
{{--        </table>--}}
{{--    </page_footer>--}}

{{--    <table style="margin-top: 30mm" class="test" cellspacing="0" cellpadding="0" border="0">--}}
{{--        <tr>--}}
{{--            <td style="width: 30%; height: 30px; border-bottom: 2px solid #FFFE00; font-size: 18px">--}}
{{--                DEVIS réf : <b>{{ $estimation->reference }}</b>--}}
{{--            </td>--}}
{{--            <td style="width: 70%; text-align: right">Fait à le Chesnay, le {{ $estimation->created_at->format('d/m/Y') }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="line-height: 30px; height: 30px; font-size: 30px">&nbsp;</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td colspan="2" style="font-weight: bold; height: 20px; font-size: 16px">{{ $estimation->client->name }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td colspan="2" style="height: 20px; font-size: 16px">{{ $estimation->contact->name }} {{ $estimation->contact->lastname}} </td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td colspan="2" style="height: 20px; font-size: 16px">{{ $estimation->client->address }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td colspan="2" style="height: 20px; font-size: 16px">{{ $estimation->client->zip }} {{ $estimation->client->city }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td colspan="2" style="height: 20px; font-size: 16px">{{ $estimation->contact->email }}</td>--}}
{{--        </tr>--}}
{{--    </table>--}}
{{--    <table style="margin-top: 10mm; table-layout: fixed; border-bottom: 1px solid yellow; padding-bottom: 5mm">--}}
{{--        <tr>--}}
{{--            <td style="width: 85%; border-bottom: 1px solid yellow"><h2>Description</h2></td>--}}
{{--            <td style="width: 15%; border-bottom: 1px solid yellow; text-align: right"><h2>PV HT</h2></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="width:85%; word-break: break-word; font-size: 14px; padding-top: 5mm">A voir</td>--}}
{{--            <td style="width: 15%">&nbsp;</td>--}}
{{--        </tr>--}}
{{--    </table>--}}

{{--    <table style="margin-top: 10mm">--}}
{{--        <tr>--}}
{{--            <td style="text-align: right; width: 80%; font-weight: bold; text-transform: uppercase">Total HT : </td>--}}
{{--            <td style="text-align: right; width: 20%; font-weight: bold; text-transform: uppercase">A voir €</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="text-align: right; width: 80%; font-weight: bold; text-transform: uppercase">TVA : </td>--}}
{{--            <td style="text-align: right; width: 20%; font-weight: bold; text-transform: uppercase">A voir €</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="text-align: right; width: 80%; font-weight: bold; text-transform: uppercase">Total TTC : </td>--}}
{{--            <td style="text-align: right; width: 20%; font-weight: bold; text-transform: uppercase">A voir €</td>--}}
{{--        </tr>--}}
{{--    </table>--}}
{{--    <nobreak>--}}
{{--        <table style="margin-top: 30mm">--}}
{{--            <tr>--}}
{{--                <td style="width: 80%">Conditions de paiement : </td>--}}
{{--                <td style="width: 20%; text-align: right">Date et signature :</td>--}}
{{--            </tr>--}}

{{--            <tr>--}}
{{--                <td colspan="2" style="width: 100%; text-align: right">Devis signé le :  </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td colspan="2" style="width: 100%; text-align: right">par : </td>--}}
{{--            </tr>--}}
{{--        </table>--}}
{{--    </nobreak>--}}
{{--</page>--}}


<!-- EXAMPLE OF CSS STYLE -->
<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        text-decoration: underline;
    }
    p.first {
        color: #003300;
        font-family: helvetica;
        font-size: 12pt;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    p#second {
        color: rgb(00,63,127);
        font-family: times;
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
        background-color: #FFFFAA;
    }
    table.first {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        border-left: 3px solid red;
        border-right: 3px solid #FF00FF;
        border-top: 3px solid green;
        border-bottom: 3px solid blue;
        background-color: #ccffcc;
    }
    td.border {
        border: 2px solid blue;
        background-color: #ffffee;
    }
    td.second {
        border: 2px dashed green;
    }
    div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: aristalight;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 2px 2px 2px 2px;
        border-color: green #FF00FF blue red;
        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style>
<img src="{{ base_path('public/images/logo-mout-factures.png') }}" style="width: 100%; ">

<table style="width: 100%">
    <tr>
        <td colspan="2" style="height: 30px; font-size: 30px; line-height: 30px">&nbsp;</td>
    </tr>
    <tr>
        <td style="width: 30%; border-bottom: 2px solid #FFFE00; height: 22px; font-size: 20px; font-family: aristaregular;">Devis Réf : <b>{{ $estimation->reference }}</b></td>
        <td style="width: 70%; text-align: right">Fait à Le Chesnay le {{ $estimation->created_at->format('d/m/Y') }}</td>
    </tr>
</table>
<p class="first">Example of paragraph with class selector. <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.</span></p>

<p id="second">Example of paragraph with ID selector. <span>Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.</span></p>

<div class="test">example of DIV with border and fill.
    <br />Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    <br /><span class="lowercase">text-transform <b>LOWERCASE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
    <br /><span class="uppercase">text-transform <b>uppercase</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
    <br /><span class="capitalize">text-transform <b>cAPITALIZE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
</div>

<br />

<table class="first" cellpadding="4" cellspacing="6">
    <tr>
        <td width="30" align="center"><b>No.</b></td>
        <td width="140" align="center" bgcolor="#FFFF00"><b>XXXX</b></td>
        <td width="140" align="center"><b>XXXX</b></td>
        <td width="80" align="center"> <b>XXXX</b></td>
        <td width="80" align="center"><b>XXXX</b></td>
        <td width="45" align="center"><b>XXXX</b></td>
    </tr>
    <tr>
        <td width="30" align="center">1.</td>
        <td width="140" rowspan="6" class="second">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
        <td width="140">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td width="80">XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="30" align="center" rowspan="3">2.</td>
        <td width="140" rowspan="3">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="80" rowspan="2" >XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="30" align="center">3.</td>
        <td width="140">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr bgcolor="#FFFF80">
        <td width="30" align="center">4.</td>
        <td width="140" bgcolor="#00CC00" color="#FFFF00">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
</table>
