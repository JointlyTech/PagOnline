<?php

namespace PagOnline\Init\Requests;

use PagOnline\BaseIgfsCgRequest;

final class IgfsCgInitRequest extends BaseIgfsCgRequest
{
    const CONTENT = <<<XML
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.api.web.cg.igfs.apps.netsw.it/">
<soapenv:Body>
<ser:Init>
<request>
<apiVersion><![CDATA[{apiVersion}]]></apiVersion>
{tid}
{merID}
{payInstr}
<signature><![CDATA[{signature}]]></signature>
<shopID><![CDATA[{shopID}]]></shopID>
{shopUserRef}
{shopUserName}
{shopUserAccount}
{shopUserMobilePhone}
{shopUserIMEI}
<trType><![CDATA[{trType}]]></trType>
{amount}
{currencyCode}
<langID><![CDATA[{langID}]]></langID>
<notifyURL><![CDATA[{notifyURL}]]></notifyURL>
<errorURL><![CDATA[{errorURL}]]></errorURL>
{callbackURL}
{addInfo1}
{addInfo2}
{addInfo3}
{addInfo4}
{addInfo5}
{payInstrToken}
{billingID}
{regenPayInstrToken}
{keepOnRegenPayInstrToken}
{payInstrTokenExpire}
{payInstrTokenUsageLimit}
{payInstrTokenAlg}
{accountName}
{level3Info}
{mandateInfo}
{description}
{paymentReason}
{topUpID}
{firstTopUp}
{payInstrTokenAsTopUpID}
{validityExpire}
{minExpireMonth}
{minExpireYear}
{termInfo}
</request>
</ser:Init>
</soapenv:Body>
</soapenv:Envelope>
XML;
}
