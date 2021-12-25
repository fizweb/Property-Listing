<p>
  Hello {{ $contact->name }}, <br/>
  we have received your inquery about a property as follows: <br/>
</p>

<p>
  Property: {{ $property->title }} <br/>
  Location: {{ $property->location->name }} <br/>
  Type: {{ ucwords($property->property_type) }} <br/>
  Dealings: {{ ucwords($property->dealings_type) }} <br/>
  Main Feature: {{ ucwords($property->feature_type) }} <br/>
  Bedrooms: {{ $property->bedrooms ?? 'N/A' }} <br/>
  Bathrooms: {{ $property->bathrooms ?? 'N/A' }} <br/>
  Gross SMT: {{ $property->gross_smt }} <br/>
  Net SMT: {{ $property->net_smt }} <br/>
  Pool: {{ ucwords($property->pool) }} <br/>
  Price: TL {{ number_format($property->price, 2, '.', ',') }} <br/>
</p>

<p>
  We will contact you soon about your request. <br/>
  You can contact with our support team if needed. <br/>
</p>

<br/>
<br/>

<p>
  Thank you for stay with us. <br/>
</p>

<br/>
<br/>
<br/>


