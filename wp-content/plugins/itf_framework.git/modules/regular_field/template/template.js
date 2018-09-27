const regular_field =
    `<div class="regular_field_description"><%- field.title %></div>
    <span 
        class="regular_field <%- field.class %>"
        contenteditable="true"
        spellcheck="false"
        data-type="<%- field.type %>"
        data-name="<%- field.name %>"
        data-placeholder="'<%- field.placeholder %>'"
    ><%- field.value %></span>`;

export default regular_field;

