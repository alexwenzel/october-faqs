# october FAQs

- create / manage FAQs
- display FAQs with components
- schema.org definition included ([read more](https://schema.org/FAQPage))

## create a FAQ

- Choose the FAQ icon from the nav bar
- Click New FAQ
- Optionally give the FAQ a name
- Add questions by clicking the Add Question button and filling out the form
- Save the FAQ and make a note of the Id number that is created

To reorder the questions, make sure you have saved the FAQ first and then click the "Reorder Question" and drag the
questions to the correct order and hit save.

## display a specific FAQ

In your template add the FAQ component and set the FAQ to the Id/slug you want to display

````
[faq]
slug = "mySlug"
````

and then use the `faq` component to display the specific faq

```
{% component 'faq' %}
```

## display a list of all FAQs

Add the `faqlist` component to your page

````
[faqlist]
````

and query all faq lists like this.

````
{% for item in faqlist.all %}
    #{{ item.id }} {{ item.name }}
{% endfor %}
````

or override the default component template.
