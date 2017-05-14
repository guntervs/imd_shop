<?php

/* modules/custom/imd_shop/templates/shopping-cart.html.twig */
class __TwigTemplate_1d2dfb7ed5b92963a3da9f8c4ed2c959a697ab5efaac0709cca3c28a398b6d2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("trans" => 2, "if" => 3, "for" => 5);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('trans', 'if', 'for'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div class=\"cart\">
    <h2>";
        // line 2
        echo t("Shopping cart", array());
        echo "</h2>
    ";
        // line 3
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 4
            echo "        <ul class=\"products\">
            ";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 6
                echo "                <li>
                    ";
                // line 7
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["product"], "qty", array()), "html", null, true));
                echo "x ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["product"], "label", array()), "html", null, true));
                echo "
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "        </ul>

        <a href=\"#\" class=\"button\">Order products</a>
    ";
        } else {
            // line 14
            echo "        No products
    ";
        }
        // line 16
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/imd_shop/templates/shopping-cart.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 16,  79 => 14,  73 => 10,  62 => 7,  59 => 6,  55 => 5,  52 => 4,  50 => 3,  46 => 2,  43 => 1,);
    }

    public function getSource()
    {
        return "<div class=\"cart\">
    <h2>{% trans %}Shopping cart{% endtrans %}</h2>
    {% if products %}
        <ul class=\"products\">
            {% for product in products %}
                <li>
                    {{ product.qty }}x {{ product.label }}
                </li>
            {% endfor %}
        </ul>

        <a href=\"#\" class=\"button\">Order products</a>
    {% else %}
        No products
    {% endif %}
</div>
";
    }
}
