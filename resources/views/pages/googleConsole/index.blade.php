<x-base-layout>
        {{ theme()->getView('layout/demo1/toolbars/_domain_toolbar', array('domainName' => $domainName,'searchMainTypeID' => $searchMainTypeID,'searchInputID' => $searchInputID,'searchPlaceholder' => $searchPlaceholder)) }}
        <iframe width="100%" height="1000" id="googleConsoleId" src="" frameborder="0" style="border:0" allowfullscreen></iframe>
</x-base-layout>
